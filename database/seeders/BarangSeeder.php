<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            'kd_brg' => "KD" . time() . "BRG" . rand(0, 999),
            'id' => '2',
            'kd_ktgr' => '1',
            'nama' => 'Sepatu Kain',
            'harga' => 250000,
            'foto' => 'product-1.png',
            'stok' => 100,
            'diskon' => 10,
            'created_at' => now()
        ]);
        DB::table('barang')->insert([
            'kd_brg' => "KD" . time() . "BRG" . rand(0, 999),
            'id' => '2',
            'kd_ktgr' => '1',
            'nama' => 'Sepatu Kain Coklat',
            'harga' => 150000,
            'foto' => 'product-2.png',
            'stok' => 100,
            'diskon' => 10,
            'created_at' => now()
        ]);
    }
}
