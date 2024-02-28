<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@local.test';
        $admin->password = Hash::make('letmein');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User;
        $user->name = 'user';
        $user->email = 'user@local.test';
        $user->password = Hash::make('password');
        $admin->save();
        $admin->roles()->attach(Role::where('name', 'user')->first());
    }
}
