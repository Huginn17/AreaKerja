<?php

namespace App\Http\Controllers;

use App\Helpers\BrowserPath;
use App\Models\CatatanCash;
use App\Models\CatatanKoin;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Browsershot\Browsershot;

class FinanceController extends Controller
{
    public function verifikasi($id, Request $request)
    {
        $transaksi = CatatanCash::findOrFail($id);
        $perusahaan = $transaksi->user->perusahaan;
        $paket = $transaksi->hargaPembayaran;
        $pelamar = $transaksi->user->pelamar;

        if ($request->action == 'terima' && $transaksi->status !== 'diterima') {
            $transaksi->status = 'diterima';
            $transaksi->save();

            // Kalau transaksi TOP UP → tambah koin
            if ($paket && $paket->jumlah_koin > 0) {
                $perusahaan->koin_perusahaan += $paket->jumlah_koin;
                $perusahaan->save();
            } else {
                // Kalau transaksi PENDAFTARAN KANDIDAT → ubah kategori jadi calon kandidat
                if ($pelamar) {
                    $pelamar->kategori = 'calon kandidat';
                    $pelamar->save();
                }
            }
        } elseif ($request->action == 'tolak' && $transaksi->status === 'diterima') {
            $transaksi->status = 'ditolak';
            $transaksi->save();

            // Kalau transaksi TOP UP → rollback koin
            if ($paket && $paket->jumlah_koin > 0) {
                $perusahaan->koin_perusahaan -= $paket->jumlah_koin;
                if ($perusahaan->koin_perusahaan < 0) {
                    $perusahaan->koin_perusahaan = 0;
                }
                $perusahaan->save();
            } else {
                // Kalau transaksi PENDAFTARAN KANDIDAT → rollback kategori jadi pelamar lagi
                if ($pelamar) {
                    $pelamar->kategori = 'pelamar';
                    $pelamar->save();
                }
            }
        } elseif ($request->action == 'tolak') {
            // Tolak langsung dari pending → hanya ubah status
            $transaksi->status = 'ditolak';
            $transaksi->save();
        }

        return redirect()->route('finance.laporan')
            ->with('success', 'Transaksi berhasil diverifikasi: ' . $transaksi->status);
    }



    public function laporan(Request $request)
    {

        $queryCash = CatatanCash::with(['user', 'hargaPembayaran', 'bank']);
        if ($request->periode) {
            $queryCash->where('created_at', '>=', now()->subMonths($request->periode));
        }
        $catatanCash = $queryCash->orderBy('created_at', 'desc')->take(6)->get();

        $queryKoin = CatatanKoin::with(['user']);
        if ($request->periode) {
            $queryKoin->where('created_at', '>=', now()->subMonths($request->periode));
        }
        $catatanKoin = $queryKoin->orderBy('created_at', 'desc')->take(6)->get();

        return view('finance.catatan-tran', compact('catatanCash', 'catatanKoin'));
    }


    public function detail($id)
    {
        $transaksi = CatatanCash::with(['user', 'hargaPembayaran', 'bank'])->findOrFail($id);

        return response()->json([
            'id' => $transaksi->id,
            'user' => $transaksi->user->name ?? '-',
            'email' => $transaksi->user->email ?? '-',
            'bank' => $transaksi->bank->nama_bank ?? '-',
            'nomor_rekening' => $transaksi->bank->nomor_rekening ?? '-',
            'harga' => number_format($transaksi->hargaPembayaran->harga ?? 0, 0, ',', '.'),
            'jumlah_koin' => $transaksi->hargaPembayaran->jumlah_koin ?? 0,
            'status' => ucfirst($transaksi->status),
            'created_at' => $transaksi->created_at->format('d M Y H:i')
        ]);
    }

    public function hal_detail()
    {
        $catatanKoins = CatatanKoin::with('user')->latest()->get();
        $catatanCashs = CatatanCash::with(['user', 'bank', 'hargaPembayaran'])->latest()->get();

        return view('finance.detail-cat-koin', compact('catatanKoins', 'catatanCashs'));
    }



    public function omset_perusahaan(Request $request)
    {
        $periode = $request->periode;

        $cashQuery = CatatanCash::with('hargaPembayaran')
            ->where('status', 'diterima');

        // Filter waktu
        if ($periode && $periode !== 'current') {
            $cashQuery->where('created_at', '>=', now()->subMonths($periode));
        } elseif ($periode === 'current') {
            $cashQuery->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year);
        }

        $cashData = $cashQuery->get();

        // Kelompokkan per bulan
        $omsetPerBulan = $cashData
            ->groupBy(fn($item) => Carbon::parse($item->created_at)->format('Y-m'))
            ->map(function ($group) {
                $total = 0;
                foreach ($group as $item) {
                    if ($item->hargaPembayaran) {
                        $total += $item->hargaPembayaran->harga;
                    }
                }

                $first = $group->first();
                return [
                    'bulan' => Carbon::parse($first->created_at)->month,
                    'nama_bulan' => Carbon::parse($first->created_at)->translatedFormat('F'),
                    'tahun' => Carbon::parse($first->created_at)->year,
                    'total' => $total,
                ];
            })
            ->sortByDesc('tahun')
            ->sortByDesc('bulan')
            ->values();

        $totalOmset = $omsetPerBulan->sum('total');
        $rataRata = $omsetPerBulan->count() > 0 ? $totalOmset / $omsetPerBulan->count() : 0;

        return view('finance.omset-perusahaan', [
            'omsetPerBulan' => $omsetPerBulan,
            'totalOmset' => $totalOmset,
            'rataRata' => $rataRata,
            'periodeDipilih' => $periode,
        ]);
    }



    public function unduh_omset()
    {
        $cashData = CatatanCash::with('hargaPembayaran')
            ->where('status', 'diterima')
            ->get();


        $omsetPerBulan = $cashData
            ->groupBy(fn($item) => Carbon::parse($item->created_at)->format('Y-m'))
            ->map(function ($group) {
                $total = 0;
                foreach ($group as $item) {
                    if ($item->hargaPembayaran) {
                        $total += $item->hargaPembayaran->harga;
                    }
                }

                $first = $group->first();
                return [
                    'bulan_angka' => Carbon::parse($first->created_at)->month,
                    'bulan' => Carbon::parse($first->created_at)->translatedFormat('F Y'),
                    'total' => $total,
                ];
            })
            ->sortBy('bulan_angka')
            ->values();

        $totalOmset = $omsetPerBulan->sum('total');
        $rataRata = $omsetPerBulan->count() > 0 ? $totalOmset / $omsetPerBulan->count() : 0;


        // Logo Base64
        $logoPath = public_path('images/logoarea.png');
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));

        // Data untuk view
        $data = [
            'omsetPerBulan' => $omsetPerBulan,
            'totalOmset' => $totalOmset,
            'rataRata' => $rataRata,
            'jumlahBulan' => $omsetPerBulan->count(),
            'tanggal' => Carbon::now()->translatedFormat('F d, Y, H:i a'),
            'logoBase64' => $logoBase64,
        ];

        // 🔹 Render Blade ke HTML
        $html = View::make('finance.page-unduh-omset', $data)->render();

        // 🔹 Bungkus dengan HTML lengkap + Tailwind CDN
        $htmlWithCss = '
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Laporan Omset Perusahaan</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <style>
                body {
                    font-family: "Inter", ui-sans-serif, system-ui, -apple-system,
                        BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue",
                        Arial, "Noto Sans", sans-serif;
                }
            </style>
        </head>
        <body class="text-[12px] text-black font-sans mx-8 my-6">
            ' . $html . '
        </body>
        </html>
    ';

        // 🔹 Jalankan Browsershot
        $browserPath = BrowserPath::detect();
        if (!$browserPath) {
            return response()->json([
                "error" => "Browser Chrome/Edge tidak ditemukan. Pastikan sudah terinstall."
            ], 500);
        }

        $pdf = Browsershot::html($htmlWithCss)
            ->setOption('executablePath', $browserPath)
            ->noSandbox()
            ->showBackground()
            ->format('A4')
            ->margins(10, 15, 10, 15)
            ->pdf();

        // 🔹 Kembalikan file PDF untuk diunduh
        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Laporan_Omset_Perusahaan.pdf"');
    }
}
