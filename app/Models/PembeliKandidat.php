<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembeliKandidat extends Model
{
    use HasFactory;
    protected $table = 'pembeli_kandidats';
    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function lowonganPerusahaan()
    {
        return $this->belongsTo(lowonganPerusahaan::class, 'lowongan_perusahaan_id');
    }

    public function catatanKoin()
    {
        return $this->hasOne(CatatanKoin::class, 'no_referensi','no_referensi');
    }
}
