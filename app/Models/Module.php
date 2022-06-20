<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//模块
class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'name', 'version', 'author', 'install', 'preview'];

    protected $casts = ['install' => 'boolean'];

    protected $appends = ['permission', 'config'];

    public function getPermissionAttribute()
    {
        $file = base_path("addons/{$this->name}/Config/permissions.php");

        return is_file($file) ? include $file : [];
    }

    public function getConfigAttribute()
    {
        $file = base_path("addons/{$this->name}/Config/config.php");

        return is_file($file) ? include $file : [];
    }
}
