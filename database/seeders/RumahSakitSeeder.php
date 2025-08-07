<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RumahSakit;

class RumahSakitSeeder extends Seeder
{
    public function run()
    {
        RumahSakit::insert([
            ['nama' => 'RS Harapan Bunda', 'alamat' => 'Jl. Harapan No. 1', 'email' => 'info@harapanbunda.com', 'telepon' =>
            '02188888888'],
            ['nama' => 'RS Citra Medika', 'alamat' => 'Jl. Citra Sehat No. 99', 'email' => 'kontak@citramedika.com', 'telepon' =>
            '02177777777'],
            ['nama' => 'RS Sehat Selalu', 'alamat' => 'Jl. Sehat No. 123', 'email' => 'admin@sehatselalu.com', 'telepon' =>
            '02166666666'],
            ['nama' => 'RS Kasih Ibu', 'alamat' => 'Jl. Ibu No. 45', 'email' => 'info@kasihibu.com', 'telepon' => '02155555555'],
            ['nama' => 'RS Mitra Keluarga', 'alamat' => 'Jl. Keluarga No. 10', 'email' => 'info@mitrakeluarga.com', 'telepon' =>
            '02144444444'],
            ['nama' => 'RS Brawijaya', 'alamat' => 'Jl. Brawijaya No. 77', 'email' => 'info@brawijaya.com', 'telepon' =>
            '02133333333'],
            ['nama' => 'RS Premier Jatinegara','alamat' => 'Jl. Jatinegara No. 5', 'email' => 'info@premier.com', 'telepon' =>
            '02122222222'],
            ['nama' => 'RS Hermina', 'alamat' => 'Jl. Hermina No. 88', 'email' => 'info@hermina.com', 'telepon' => '02111111111'],
            ['nama' => 'RS Pusat Pertamina', 'alamat' => 'Jl. Pertamina No. 20', 'email' => 'info@rsppertamina.com', 'telepon' =>
            '02199999999'],
            ['nama' => 'RS Fatmawati', 'alamat' => 'Jl. Fatmawati No. 31', 'email' => 'info@rsfatmawati.com', 'telepon' =>
            '02112312312'],
        ]);
    }
}