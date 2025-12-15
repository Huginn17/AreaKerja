<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\Perusahaan;
use App\Models\TipsKerja;
use Illuminate\Http\Request;

class ShareLowonganController extends Controller
{
    public function share($platform, $companySlug, $jobSlug)
    {
        $perusahaan = Perusahaan::where('slug', $companySlug)->firstOrFail();

        $lowongan = LowonganPerusahaan::where('slug', $jobSlug)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        $url = route('detail.lowongan.non.user', [
            'perusahaan' => $companySlug,
            'lowongan'   => $jobSlug,
        ]);

        $text = "Check out this job opportunity: {$lowongan->nama}\n{$url}";

        switch ($platform) {
            case 'whatsapp':
                $shareUrl = "https://wa.me/?text=" . urlencode($text);
                break;

            case 'email':
                $subject = "Lowongan: {$lowongan->nama}";
                $shareUrl = "mailto:?subject=" . urlencode($subject) .
                    "&body=" . urlencode($text);
                break;

            case 'linkedin':
                $shareUrl = "https://www.linkedin.com/sharing/share-offsite/?url=" . urlencode($url);
                break;

            default:
                abort(404);
        }

        return redirect()->away($shareUrl);
    }






    public function sharetips($platform, $slug)
    {
        $tips = TipsKerja::where('slug', $slug)->firstOrFail();

        // PAKAI SLUG (BUKAN ID)
        $url = route('pelamar.tips-kerja.show', $tips->slug);

        switch ($platform) {

            case 'whatsapp':
                $text = "Baca tips kerja ini:\n\n{$tips->title}\n\n{$url}";
                $shareUrl = "https://wa.me/?text=" . urlencode($text);
                break;

            case 'email':
                $subject = "Tips Kerja: {$tips->title}";
                $body = "{$tips->title}\n\n{$url}";
                $shareUrl = "mailto:?subject=" . urlencode($subject) .
                    "&body=" . urlencode($body);
                break;

            case 'linkedin':
                $shareUrl = "https://www.linkedin.com/sharing/share-offsite/?url=" . urlencode($url);
                break;

            case 'website':
                return redirect($url);

            default:
                abort(404, 'Platform tidak ditemukan.');
        }

        return redirect()->away($shareUrl);
    }
}
