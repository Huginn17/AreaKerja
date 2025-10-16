<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamars';
    protected $guarded = [];

    protected $casts = [
        'divisi' => 'array',
    ];



    public function getUmurAttribute()
    {
        return Carbon::parse($this->tanggal_lahir)->age;
    }

    public function getGenderSingkatAttribute()
    {
        if (strtolower($this->gender) == 'laki-laki') {
            return 'L';
        }
        if (strtolower($this->gender) == 'perempuan') {
            return 'P';
        }

        return $this->gender;
    }


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

    public function pembelianKandidat()
    {
        return $this->hasMany(PembeliKandidat::class, 'pelamar_id');
    }

    public function divisi_pelamars()
    {
        return $this->hasMany(DivisiPelamar::class, 'pelamar_id');
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
