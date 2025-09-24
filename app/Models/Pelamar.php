<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamars';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alamat_pelamar()
    {
        return $this->hasMany(AlamatPelamar::class, 'pelamar_id');
    }

    public function riwayat_pendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class, 'pelamar_id');
    }

    public function pengalaman_organisasi()
    {
        return $this->hasMany(Organisasi::class, 'pelamar_id');
    }

    public function pengalaman_kerja()
    {
        return $this->hasMany(PengalamanKerja::class, 'pelamar_id');
    }

    public function skill()
    {
        return $this->hasMany(Skill::class, 'pelamar_id');
    }

    public function sosmed()
    {
        return $this->hasOne(SocialMediaPelamar::class, 'pelamar_id');
    }

    public function simpanLowongans()
    {
        return $this->hasMany(SimpanLowongan::class, 'pelamar_id');
    }

    // public function pelamar_lowongan()
    // {
    //     return 
    // }


    public function lowongans()
    {
        return $this->belongsToMany(LowonganPerusahaan::class, 'pelamar_lowongans', 'pelamar_id', 'lowongan_id')->withPivot('status')->withTimestamps();
    }
    public function isCvComplete()
    {
        return $this->riwayat_pendidikan()->exists()
            && $this->pengalaman_kerja()->exists()
            && $this->skill()->exists()
            && $this->sosmed()->exists();
    }
}
