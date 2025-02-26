<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Adinda Siska', 'penjualan_kode' => 'PNJ001', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 2, 'user_id' => 1, 'pembeli' => 'Alifia Atalia', 'penjualan_kode' => 'PNJ002', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 3, 'user_id' => 1, 'pembeli' => 'Michael Johnson', 'penjualan_kode' => 'PNJ003', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Fajar Bayu', 'penjualan_kode' => 'PNJ004', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 5, 'user_id' => 1, 'pembeli' => 'Purnomo Putra', 'penjualan_kode' => 'PNJ005', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 6, 'user_id' => 1, 'pembeli' => 'Siska Nuri', 'penjualan_kode' => 'PNJ006', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'James Garcia', 'penjualan_kode' => 'PNJ007', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 8, 'user_id' => 1, 'pembeli' => 'Sophia Martinez', 'penjualan_kode' => 'PNJ008', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 9, 'user_id' => 1, 'pembeli' => 'Liam Anderson', 'penjualan_kode' => 'PNJ009', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Isabella Thomas', 'penjualan_kode' => 'PNJ010', 'penjualan_tanggal' => now()],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
