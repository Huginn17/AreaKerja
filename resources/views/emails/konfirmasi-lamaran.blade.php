<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Konfirmasi Interview</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; margin:0; padding:0; background:#f7f7f7;">
    <div
        style="max-width:600px; margin:30px auto; background:#fff; border:1px solid #ddd; border-radius:12px; padding:30px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

        <!-- Judul -->
        <h2 style="margin-top:0; color:#111;">Selamat Kepada</h2>
        <p style="margin:0; font-weight:bold; font-size:16px;">{{ $pelamar->user->name }}</p>
        <p style="margin:0 0 20px 0;">Status : {{ $pelamar->status_pekerjaan ?? 'Belum Kerja' }}</p>

        <!-- Isi -->
        @php
            $status = $data->status ?? 'pending'; // $data = PelamarLowongan

            $statusText =
                [
                    'pending' => 'Sedang Diproses',
                    'diterima' => 'Diterima',
                    'ditolak' => 'Ditolak',
                ][$status] ?? 'Sedang Diproses';

            $statusColor =
                [
                    'pending' => '#f59e0b', // orange
                    'diterima' => 'green',
                    'ditolak' => 'red',
                ][$status] ?? '#f59e0b';
        @endphp
        <p>
            Lamaran yang anda ajukan ke lowongan kami pada Divisi
            <b>{{ $lowongan->judul }}</b> telah kami
            <span style="color:{{ $statusColor }}; font-weight:bold;">
                {{ strtoupper($statusText) }}
            </span>.
        </p>

        <p>Oleh karena itu, kami mengharapkan kehadiran anda pada :</p>

        <table style="margin:10px 0; width:100%; border-collapse:collapse;">
            <tr>
                <td style="font-weight:bold; width:100px; padding:4px 0;">Tanggal</td>
                <td>: {{ \Carbon\Carbon::parse($konfirmasi['tanggal'])->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td style="font-weight:bold; padding:4px 0;">Pukul</td>
                <td>: {{ $konfirmasi['waktu'] }}</td>
            </tr>
            <tr>
                <td style="font-weight:bold; padding:4px 0;">Tempat</td>
                <td>: {{ $konfirmasi['tempat'] }}</td>
            </tr>
            <tr>
                <td style="font-weight:bold; padding:4px 0;">Keperluan</td>
                <td>: Wawancara Kerja</td>
            </tr>
        </table>

        <p><b>Catatan :</b> {{ $konfirmasi['catatan'] ?? '-' }}</p>

        <br>
        <p>Hormat kami,</p>
        <p><b>{{ $lowongan->perusahaan->nama_perusahaan }}</b></p>

        <!-- Footer Logo -->
        <div style="text-align:center; margin-top:40px;">
            <img src="{{ $message->embed(public_path('images/logoarea.png')) }}" alt="logoarea"
                style="width:60px; margin-bottom:5px;">
            <p style="font-size:12px; color:#aaa;">Copyright©{{ date('Y') }} areakerja.com</p>
        </div>
    </div>
</body>

</html>
