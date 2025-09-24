<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalWawancara extends Model
{
    use HasFactory;
    protected $table = 'jadwal_wawancaras';
    protected $guarded = [];

    public function pelamar_lowongan()
    {
        return $this->belongsTo(PelamarLowongan::class, 'pelamar_lowongan_id');
    }
}
