<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaPelamar extends Model
{
    use HasFactory;

    protected $table = 'social_media_pelamar';
    protected $guarded = [''];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
