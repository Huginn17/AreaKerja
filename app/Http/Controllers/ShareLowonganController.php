<?php

namespace App\Http\Controllers;

use App\Models\LowonganPerusahaan;
use App\Models\TipsKerja;
use Illuminate\Http\Request;

class ShareLowonganController extends Controller
{
    public function share($platform, $slug)
    {
        $lowongan = LowonganPerusahaan::where('slug', $slug)->firstOrfail();

        //url halaman detail Lowongan 
        $url = route('detail.lowongan.non.user', $lowongan->slug);

        //pesan share default
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
                $shareUrl = "https://www.linkedin.com/sharing/share-offsite/?url=" . $url;
                break;

            case 'website':
                // Untuk website, biasanya hanya copy link → redirect ke detail
                return redirect($url);

            default:
                abort(404, 'Platform tidak ditemukan.');
        }

        return redirect()->away($shareUrl);
    }



    public function sharetips($platform, $slug)
{
    $tips = TipsKerja::where('slug', $slug)->firstOrFail();

    // URL detail Tips Kerja
    $url = route('pelamar.tips-kerja.show', $tips->id);

    // Pesan share default
    $text = "Baca tips kerja ini: {$tips->title}\n{$url}";

    switch ($platform) {

        case 'whatsapp':
            $shareUrl = "https://wa.me/?text=" . urlencode($text);
            break;

        case 'email':
            $subject = "Tips Kerja: {$tips->title}";
            $shareUrl = "mailto:?subject=" . urlencode($subject) .
                        "&body=" . urlencode($text);
            break;

        case 'linkedin':
            $shareUrl = "https://www.linkedin.com/sharing/share-offsite/?url=" . $url;
            break;

        case 'website':
            return redirect($url);

        default:
            abort(404, 'Platform tidak ditemukan.');
    }

    return redirect()->away($shareUrl);
}

}
