<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamars';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function alamat_pelamar(){
        return $this->hasMany(AlamatPelamar::class, 'pelamar_id');
    }

    public function pengalaman_organisasi(){
        return $this->hasMany(Organisasi::class, 'pelamar_id');
    }

    public function pengalaman_kerja(){
        return $this->hasMany(PengalamanKerja::class, 'pelamar_id');
    }

    public function skill(){
        return $this->hasMany(Skill::class, 'pelamar_id');
    }

    public function sosmed(){
        return $this->hasOne(SocialMediaPelamar::class, 'pelamar_id');
    }

}
