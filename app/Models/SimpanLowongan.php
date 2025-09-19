<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpanLowongan extends Model
{
    use HasFactory;

    protected $table = 'simpan_lowongans';
    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(LowonganPerusahaan::class, 'lowongan_id');
    }
}
