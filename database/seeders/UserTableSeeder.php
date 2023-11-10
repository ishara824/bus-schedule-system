<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt(12345678),
            ],
            [
                'name' => 'Manager',
                'email' => 'manager@test.com',
                'password' => bcrypt(12345678),
            ],
            [
                'name' => 'Staff',
                'email' => 'staff@test.com',
                'password' => bcrypt(12345678),
            ]
        ]);
    }
}
