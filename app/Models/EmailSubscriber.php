<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSubscriber extends Model
{
    
    use HasFactory;
    protected $table = 'email_subscribers';
    protected $guarded = [];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
