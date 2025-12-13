<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Status Lamaran</title>
</head>

<body style="font-family:'Segoe UI', Arial, sans-serif; background:#f4f6f8; margin:0; padding:0;">

    <div
        style="max-width:600px; margin:40px auto; background:#ffffff; border-radius:14px;
                overflow:hidden; box-shadow:0 8px 20px rgba(0,0,0,0.08);">

        <!-- HEADER -->
        <div
            style="
            background:
            @php
echo match($data->status) {
                    'diterima' => 'linear-gradient(135deg,#f97316,#fb923c)',
                    'ditolak'  => 'linear-gradient(135deg,#dc2626,#ef4444)',
                    default    => 'linear-gradient(135deg,#f59e0b,#fbbf24)',
                }; @endphp;
            padding:28px 30px;
            text-align:center;
            color:#fff;
        ">
            <img src="{{ $message->embed(public_path('images/logoarea.png')) }}" alt="Logo"
                style="width:58px; margin-bottom:10px;">

            <h1 style="margin:0; font-size:22px; font-weight:600;">
                @if ($data->status === 'diterima')
                    📢 Konfirmasi Interview
                @elseif($data->status === 'ditolak')
                    ❌ Lamaran Ditolak
                @else
                    ⏳ Status Lamaran
                @endif
            </h1>

            <p style="margin-top:6px; font-size:14px; opacity:0.9;">
                {{ $lowongan->perusahaan->nama_perusahaan }}
            </p>
        </div>

        <!-- BODY -->
        <div style="padding:30px; color:#333;">
            <p style="margin-top:0;">Halo <b>{{ $pelamar->user->name }}</b>,</p>

            @if ($data->status === 'diterima')
                <p>
                    Selamat! Lamaran kamu untuk posisi
                    <b>{{ $lowongan->nama }}</b>
                    telah <b style="color:#f97316;">DITERIMA</b>.
                </p>

                <!-- DETAIL INTERVIEW -->
                <div
                    style="
                    background:#f9fafb;
                    border:1px solid #e5e7eb;
                    border-radius:10px;
                    padding:18px;
                    margin:25px 0;
                ">
                    <table style="width:100%; border-collapse:collapse; font-size:14px;">
                        <tr>
                            <td style="padding:6px 0; font-weight:600;">📅 Tanggal</td>
                            <td>
                                {{ \Carbon\Carbon::parse($konfirmasi['tanggal'])->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:6px 0; font-weight:600;">⏰ Pukul</td>
                            <td>{{ $konfirmasi['waktu'] }}</td>
                        </tr>
                        <tr>
                            <td style="padding:6px 0; font-weight:600;">📍 Tempat</td>
                            <td>
                                {{ $konfirmasi['tempat'] }}<br>

                                @if (!empty($konfirmasi['latitude']) && !empty($konfirmasi['longitude']))
                                    <a href="https://www.google.com/maps?q={{ $konfirmasi['latitude'] }},{{ $konfirmasi['longitude'] }}"
                                        target="_blank"
                                        style="
                                           display:inline-block;
                                           margin-top:6px;
                                           color:#2563eb;
                                           text-decoration:none;
                                           font-weight:600;
                                       ">
                                        🗺️ Buka di Google Maps
                                    </a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:6px 0; font-weight:600;">🎯 Keperluan</td>
                            <td>Wawancara Kerja</td>
                        </tr>
                    </table>
                </div>

                @if (!empty($konfirmasi['catatan']))
                    <div
                        style="
                        background:#eef2ff;
                        border-left:4px solid #4f46e5;
                        padding:12px 16px;
                        border-radius:6px;
                        font-size:14px;
                    ">
                        <b>📝 Catatan:</b><br>
                        {{ $konfirmasi['catatan'] }}
                    </div>
                @endif
            @elseif($data->status === 'ditolak')
                <p>
                    Terima kasih telah melamar untuk posisi
                    <b>{{ $lowongan->nama }}</b>.
                </p>
                <p style="color:#dc2626; font-weight:600;">
                    Mohon maaf, lamaran kamu dinyatakan <b>DITOLAK</b>.
                </p>
                <p>
                    Jangan berkecil hati, semoga sukses di kesempatan berikutnya 🙏
                </p>
            @else
                <p style="color:#f59e0b;">
                    Lamaran kamu sedang <b>diproses</b>.
                    Mohon tunggu informasi selanjutnya dari tim HRD.
                </p>
            @endif

            <p style="margin-top:30px;">
                Salam hangat,<br>
                <b>Tim HRD {{ $lowongan->perusahaan->nama_perusahaan }}</b>
            </p>
        </div>

        <!-- FOOTER -->
        <div
            style="
            background:#f9fafb;
            text-align:center;
            padding:18px;
            border-top:1px solid #e5e7eb;
            font-size:12px;
            color:#999;
        ">
            © {{ date('Y') }} areakerja.com
        </div>
    </div>

</body>

</html>
