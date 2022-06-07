<?php

namespace Database\Seeders;

use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    public function run()
    {
        System::create([
            'title' => '后盾人',
            'logo' => url('static/logo.png'),
            "copyright" => "后盾人",
            'config' => config('system'),
        ]);
    }
}
