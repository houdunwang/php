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

    protected $fillable = ['config', 'title', 'url'];

    protected $casts = [
        'config' => 'array',
    ];

    //站长
    public function master()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'admins')->withTimestamps();
    }

    public function config()
    {
        return $this->hasOne(SiteConfig::class, 'site_id');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'site_modules');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
