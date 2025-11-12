<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';
    protected $guarded = [];

    protected $casts = [
    // 'tanggal_berlangganan' => 'datetime',
    'tanggal_expired' => 'datetime',
];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alamat_perusahaan()
    {
        return $this->hasMany(AlamatPerusahaan::class, 'perusahaan_id');
    }

    public function pasanglowongan()
    {
        return $this->hasMany(LowonganPerusahaan::class, 'perusahaan_id');
    }

    public function lowonganPerusahaans()
    {
        return $this->hasMany(LowonganPerusahaan::class, 'perusahaan_id');
    }


    public function pembelianKandidats()
    {
        return $this->hasManyThrough(
            PembeliKandidat::class,
            LowonganPerusahaan::class,
            'perusahaan_id',            // FK di lowongan_perusahaans
            'lowongan_perusahaan_id',   // FK di pembeli_kandidats
            'id',                       // PK di perusahaans
            'id'                        // PK di lowongan_perusahaans
        );
    }

    public function catatanKoins()
    {
        return $this->hasMany(CatatanKoin::class, 'user_id', 'user_id');
    }

    public function talentHunters()
    {
        return $this->hasMany(TalentHunter::class, 'perusahaan_id');
    }
}
