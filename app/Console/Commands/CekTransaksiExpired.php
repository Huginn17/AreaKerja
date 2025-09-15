<?php

namespace App\Console\Commands;

use App\Models\CatatanCash;
use Illuminate\Console\Command;


class CekTransaksiExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaksi:cek-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status expired transaksi yang expired';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $expired = CatatanCash::where('status', 'pending')
            ->where('expired_at', '<=', now())
            ->get();

        $this->info("Ditemukan " . $expired->count() . " transaksi yang seharusnya expired");

        foreach ($expired as $trx) {
            $this->info("ID: {$trx->id}, Expired At: {$trx->expired_at}, Now: " . now());
        }

        $jumlah = CatatanCash::where('status', 'pending')
            ->where('expired_at', '<=', now())
            ->update(['status' => 'expired']);

        $this->info("$jumlah transaksi berhasil diperbarui.");
    }
}
