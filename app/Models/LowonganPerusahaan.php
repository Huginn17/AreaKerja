<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'lowongan_perusahaans';
    protected $guarded = [];

    public function paket()
    {
        return $this->belongsTo(PaketLowongan::class, 'paket_id');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function simpanLowongans()
    {
        return $this->hasMany(SimpanLowongan::class, 'lowongan_id');
    }

    public function lowongan_pelamar()
    {
        return $this->belongsToMany(PelamarLowongan::class, 'pelamar_lowongans', 'lowongan_id', 'pelamar_id');
    }

     protected $casts = [
        'published_at' => 'datetime',
        'expired_at'   => 'datetime',
    ];
}
