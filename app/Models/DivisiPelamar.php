<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiPelamar extends Model
{
    use HasFactory;
    protected $table = 'divisi_pelamars';
    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
