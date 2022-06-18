<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(2)->has(Site::factory()->has(Role::factory()))->create();

        $user  = User::first();
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = env('MOBILE');
        $user->save();

        $user  = User::find(2);
        $user->name = '后盾人';
        $user->email = 'houdunren@qq.com';
        $user->save();
    }
}
