<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

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

    protected $appends = ['module'];

    //站长
    public function master()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function roles()
    {
        return $this->hasMany(Role::class, 'site_id');
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
        return $this->belongsToMany(Module::class, 'site_modules')->withTimestamps();
    }

    public function getModuleAttribute()
    {
        return $this->modules()->wherePivot('is_default', true)->first();
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
