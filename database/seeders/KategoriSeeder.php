<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'pembuat' => 'Agus Prayogi',
            'namaK' => 'Sepatu',
            'created_at' => now()
        ]);
        DB::table('kategori')->insert([
            'pembuat' => 'Agus Prayogi',
            'namaK' => 'Jelana',
            'created_at' => now()
        ]);
        DB::table('kategori')->insert([
            'pembuat' => 'Agus Prayogi',
            'namaK' => 'Baju',
            'created_at' => now()
        ]);
    }
}
