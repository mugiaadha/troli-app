<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // items_data 1
        DB::table('items_data')->insert([
            'kode_barang' => 'FA4532',
            'nama_barang' => 'Purple Reign FA',
            'harga_barang' => '455000',
            'stok' => 10
        ]);

        // items_data 2
        DB::table('items_data')->insert([
            'kode_barang' => 'FA3518',
            'nama_barang' => 'Enchanting Belle',
            'harga_barang' => '366000',
            'stok' => 10
        ]);

        // troli_data 1
        DB::table('troli_data')->insert([
            'items_id' => 1,
            'kuantitas' => 1,
            'sub_total' => '455000'
        ]);

        // troli_data 2
        DB::table('troli_data')->insert([
            'items_id' => 2,
            'kuantitas' => 1,
            'sub_total' => '366000'
        ]);
    }
}
