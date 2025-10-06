<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Konfirmasi Interview</title>
</head>

<body style="font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.7; margin:0; padding:0; background:#f4f6f8;">

    <!-- Wrapper -->
    <div
        style="max-width:600px; margin:40px auto; background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.08);">

        <!-- Header -->
        <div
            style="background:linear-gradient(135deg,#4f46e5,#6366f1); padding:25px 30px; text-align:center; color:white;">
            <img src="{{ $message->embed(public_path('images/logoarea.png')) }}" alt="Logo"
                style="width:60px; margin-bottom:10px;">
            <h1 style="margin:0; font-size:22px; font-weight:600;">Konfirmasi Interview</h1>
            <p style="margin:0; font-size:14px; opacity:0.9;">{{ $lowongan->perusahaan->nama_perusahaan }}</p>
        </div>

        <!-- Body -->
        <div style="padding:30px;">
            <p style="margin:0 0 10px 0; color:#111;">Halo <b>{{ $pelamar->user->name }}</b>,</p>
            <p style="margin:0 0 25px 0; color:#444;">Selamat! Lamaran kamu untuk posisi <b>{{ $lowongan->nama }}</b>
                telah kami
                <span
                    style="color:
                    @php
echo [
                            'pending' => '#f59e0b',
                            'diterima' => '#16a34a',
                            'ditolak' => '#dc2626',
                        ][$data->status ?? 'pending'] ?? '#f59e0b'; @endphp
                ; font-weight:600;">
                    {{ strtoupper($data->status ?? 'Sedang Diproses') }}
                </span>.
            </p>

            <div
                style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:20px; margin-bottom:25px;">
                <table style="width:100%; border-collapse:collapse;">
                    <tr>
                        <td style="padding:6px 0; font-weight:600; color:#333;">📅 Tanggal</td>
                        <td style="padding:6px 0; color:#555;">
                            {{ \Carbon\Carbon::parse($konfirmasi['tanggal'])->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:6px 0; font-weight:600; color:#333;">⏰ Pukul</td>
                        <td style="padding:6px 0; color:#555;">{{ $konfirmasi['waktu'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding:6px 0; font-weight:600; color:#333;">📍 Tempat</td>
                        <td style="padding:6px 0; color:#555;">{{ $konfirmasi['tempat'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding:6px 0; font-weight:600; color:#333;">🎯 Keperluan</td>
                        <td style="padding:6px 0; color:#555;">Wawancara Kerja</td>
                    </tr>
                </table>
            </div>

            @if (!empty($konfirmasi['catatan']))
                <p
                    style="background:#eef2ff; border-left:4px solid #4f46e5; padding:12px 16px; border-radius:6px; font-size:14px; color:#333;">
                    <b>Catatan:</b> {{ $konfirmasi['catatan'] }}
                </p>
            @endif

            <div style="text-align:center; margin:30px 0;">
                <a href="#"
                    style="background:#4f46e5; color:white; text-decoration:none; padding:12px 25px; border-radius:8px; font-weight:600; display:inline-block;">
                    Konfirmasi Kehadiran
                </a>
            </div>

            <p style="color:#555; margin-bottom:0;">Salam hangat,</p>
            <p style="font-weight:bold; color:#111; margin-top:2px;">Tim HRD
                {{ $lowongan->perusahaan->nama_perusahaan }}</p>
        </div>

        <!-- Footer -->
        <div style="background:#f9fafb; text-align:center; padding:20px; border-top:1px solid #e5e7eb;">
            <p style="font-size:12px; color:#aaa; margin:0;">&copy; {{ date('Y') }} areakerja.com</p>
        </div>

    </div>
</body>

</html>
