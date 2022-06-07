<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function scopeCondition($query)
    {
        $type = request('type');
        $content = request('content');

        $query->where($type, $content);
    }
}
