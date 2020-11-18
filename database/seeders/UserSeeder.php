<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Agus Prayogi',
            'email' => 'agus21apy@gmail.com',
            'password' => Hash::make('akubisa-1'),
            'uang' => 100000000,
            'JK' => 'L',
            'alamat' => 'Jl. Raya Kebobang, Kebabong, Kebobang, Wonosari, Malang, Jawa Timur 65164',
            'birthdate' => '2002-08-06',
            'foto' => 'agus.jpg',
            'role' => 'admin',
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Naswa Aulia Sabila',
            'email' => 'nsaulia@gmail.com',
            'password' => Hash::make('member-1'),
            'uang' => 1000000,
            'JK' => 'P',
            'alamat' => 'Malang, Jawa Timur',
            'birthdate' => '2004-05-23',
            'foto' => 'nswaaulia.jpg',
            'role' => 'member',
            'warung' => 'NSA Shop',
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Nita Dwi Febrianti',
            'email' => 'nitaayeaye@gmail.com',
            'password' => Hash::make('ayeaye-1'),
            'uang' => 1000000,
            'JK' => 'P',
            'alamat' => 'Kepanjen, Ketapang, Sukoharjo, Kec. Kepanjen, Malang, Jawa Timur 65163',
            'birthdate' => '2003-02-14',
            'foto' => 'nita.jpg',
            'role' => 'user',
            'created_at' => now()
        ]);
    }
}
