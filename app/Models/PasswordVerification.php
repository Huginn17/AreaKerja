<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordVerification extends Model
{
    use HasFactory;
    protected $table = 'password_verifications';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
