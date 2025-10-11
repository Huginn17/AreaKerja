<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'alamat_perusahaan';
    protected $guarded = [];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }


    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
