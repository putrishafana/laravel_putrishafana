<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    public function run()
    {
        Pasien::insert([
            ['rs_id' => 1, 'nama' => 'Andi Saputra',     'alamat' => 'Jl. Merdeka No. 45',  'telepon' => '081234567890'],
            ['rs_id' => 1, 'nama' => 'Siti Nurhaliza',   'alamat' => 'Jl. Anggrek No. 9',   'telepon' => '081298765432'],
            ['rs_id' => 2, 'nama' => 'Budi Santoso',     'alamat' => 'Jl. Mawar No. 12',    'telepon' => '081387654321'],
            ['rs_id' => 2, 'nama' => 'Rina Marlina',     'alamat' => 'Jl. Melati No. 33',   'telepon' => '081322334455'],
            ['rs_id' => 3, 'nama' => 'Doni Rahmat',      'alamat' => 'Jl. Kenanga No. 14',  'telepon' => '081355556789'],
            ['rs_id' => 3, 'nama' => 'Nina Oktaviani',   'alamat' => 'Jl. Dahlia No. 25',   'telepon' => '081344447777'],
            ['rs_id' => 4, 'nama' => 'Wawan Setiawan',   'alamat' => 'Jl. Merpati No. 8',   'telepon' => '081377772222'],
            ['rs_id' => 5, 'nama' => 'Lisa Marlina',     'alamat' => 'Jl. Kamboja No. 31',  'telepon' => '081388883333'],
            ['rs_id' => 6, 'nama' => 'Zaki Ahmad',       'alamat' => 'Jl. Nangka No. 19',   'telepon' => '081399991111'],
            ['rs_id' => 6, 'nama' => 'Desi Ayu',         'alamat' => 'Jl. Pisang No. 4',    'telepon' => '081300004444'],
            ['rs_id' => 7, 'nama' => 'Rahmat Hidayat',   'alamat' => 'Jl. Apel No. 15',     'telepon' => '081355556666'],
            ['rs_id' => 8, 'nama' => 'Mira Anjani',      'alamat' => 'Jl. Jeruk No. 21',    'telepon' => '081366667777'],
            ['rs_id' => 9, 'nama' => 'Gilang Permana',   'alamat' => 'Jl. Durian No. 23',   'telepon' => '081377778888'],
            ['rs_id' => 10,'nama' => 'Intan Nuraini',    'alamat' => 'Jl. Mangga No. 26',   'telepon' => '081388889999'],
            ['rs_id' => 10,'nama' => 'Rizky Maulana',    'alamat' => 'Jl. Rambutan No. 28', 'telepon' => '081399990000'],
        ]);
    }
}