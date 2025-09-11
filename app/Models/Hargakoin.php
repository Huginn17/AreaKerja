<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hargakoin extends Model
{
    use HasFactory;
    protected $table = 'harga_koins';
    protected $guarded = [];
}
