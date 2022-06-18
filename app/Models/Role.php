<?php

namespace App\Models;

use App\Models\Scopes\ScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory, ScopeTrait;

    protected $fillable = ['name', 'title', 'site_id', 'guard_name'];
}
