<?php

namespace App\Console\Commands;

use App\Models\Perusahaan;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CekLanggananExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'langganan:cek-expired';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Nonaktifkan langganan perusahaan jika sudah lewat 1 tahun';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();

        $expired = Perusahaan::where('is_berlangganan', 1)
            ->whereDate('tanggal_expired', '<', $today)
            ->get();

        foreach ($expired as $p) {
            $p->update([
                'is_berlangganan' => 0
            ]);
            $this->info("Langganan perusahaan {$p->nama_perusahaan} telah nonaktif");
        }
        $this->info('Cek langganan selesai.');
    }
}
