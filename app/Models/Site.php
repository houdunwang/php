<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 站点
 * @package App\Models
 */
class Site extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'email', 'address', 'tel', 'config'];

    protected $casts = [
        'config' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
