<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Le Thi Lan Phuong',
            'username' => 'phuongltt',
            'email' => 'phuongltt@gmail.com',
            'phone' => '0973793711',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'permission' => 1
        ]);
    }
}
