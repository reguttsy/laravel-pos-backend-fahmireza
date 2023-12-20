<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::insert([
            [
                'name'=> 'Admin',
                'email'=>'kumaha@gmail.com',
                'role'=>'admin',
                'phone'=>'021',
                'password' => Hash::make('123'),
            ],
            [
                'name'=> 'user',
                'email'=>'panjul@gmail.com',
                'role'=>'user',
                'phone'=>'021',
                'password' => Hash::make('123'),
            ],
            [
                'name'=> 'staff',
                'email'=>'staff@gmail.com',
                'role'=>'staff',
                'phone'=>'021',
                'password' => Hash::make('123'),
            ]
            ]);
    }
}
