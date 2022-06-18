<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'name', 'version', 'author', 'install', 'preview'];

    protected $casts = ['install' => 'boolean'];

    protected static function booted()
    {
    }
}
