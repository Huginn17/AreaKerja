<?php

namespace App\Console\Commands;

use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HapusNotifikasiKadaluarsa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifikasi:hapus-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus notifikasi yang sudah lebih dari 10 hari atau lewat expired_at';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** 
         * Hapus semua data notifikasi yang sudah lebih dari 10 hari atau lewat expired_at tapi tidak lewat kolom expired_at
         */

        // $limitTanggal = now()->subDays(7);

        // $jumlah = Notifikasi::where('created_at', '<', $limitTanggal)
        //     ->forceDelete(); // kalau soft delete ON

        // $this->info("$jumlah notifikasi lama terhapus.");


        $jumlah = Notifikasi::whereNotNull('expired_at') // hanya yang punya expired
            ->where('expired_at', '<', now())            // expired_at sudah lewat
            ->delete();                                  // hapus permanen atau soft delete

        $this->info("$jumlah notifikasi expired terhapus.");
    }
}
