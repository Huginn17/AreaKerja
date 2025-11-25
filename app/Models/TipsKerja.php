<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TipsKerja extends Model
{
    use HasFactory;
    protected $table = 'tipskerjas';
    protected $guarded = [];



    protected static function boot()
{
    parent::boot();

    static::creating(function ($tips) {
        if (empty($tips->slug)) {
            $tips->slug = Str::slug($tips->title) . '-' . Str::random(6);
        }
    });
}
}
