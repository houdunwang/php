<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::factory()->create([
            'name' => 'admin',
            'title' => '管理员',
            'site_id' => 1,
            'guard_name' => 'sanctum'
        ]);
        Role::factory()->create([
            'name' => 'editor',
            'title' => '操作员',
            'site_id' => 1,
            'guard_name' => 'sanctum'
        ]);
    }
}
