<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penjualan_ids = DB::table('t_penjualan')->pluck('penjualan_id'); 
        $barang_ids = DB::table('m_barang')->pluck('barang_id'); 
        
        $data = [];
        $detail_id = 1; 
        
        foreach ($penjualan_ids as $penjualan_id) {
            $barang_acak = $barang_ids->shuffle()->take(3);
            
            foreach ($barang_acak as $barang_id) {
                $harga = rand(10000, 50000); 
                $jumlah = rand(1, 5); 
                
                $data[] = [
                    'detail_id' => $detail_id++, 
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
