<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanCash extends Model
{
    use HasFactory;
    protected $table = 'catatan_cashs';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hargaPembayaran()
    {
        return $this->belongsTo(HargaPembayaran::class);
    }

    public function bank()
    {
        return $this->belongsTo(DaftarBank::class, 'daftar_bank_id');
    }
}
