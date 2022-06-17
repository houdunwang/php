<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SystemSeeder::class,
            UserSeeder::class,
            SiteSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
