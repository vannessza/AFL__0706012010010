<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DosenPaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosen_pas')->insert([
            'nik' => '056000',
            'project' => 'Dipl.Inf. Laura Mahendratta',
            'jabatan_struktural' => "Dosen",
            'pendidikan_terakhir' => 'S2',
            'bidang_keahlian' => 'Informatika',
            'email'=>'lauramahendratta@gmail.com',
            'tempat_lahir'=>'surabay',
            'tanggal_lahir'=>'1982-09-02',
            'gender'=>'Female',
            'alamat'=>'Surabaya',
            'telp'=>'082297988091',
            'image'=>'post-images-dosenpa/7XtetI0PPaK8U3QRok0uWopg98lVYDxjEyBC2eN0.png',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        DB::table('dosen_pas')->insert([
            'nik' => '056001',
            'project' => 'Evan Tanuwijaya, S.Kom., M.Kom.',
            'jabatan_struktural' => "Dosen",
            'pendidikan_terakhir' => 'S2',
            'bidang_keahlian' => 'Informatika',
            'email'=>'evantanuwijaya@gmail.com',
            'tempat_lahir'=>'surabaya',
            'tanggal_lahir'=>'1995-09-20',
            'gender'=>'male',
            'alamat'=>'Surabaya',
            'telp'=>'082297988091',
            'image'=>'post-images-dosenpa/2vqwYz1jIvY0h8BU6IbmzLUZlKiPK6YPRozyRP0m.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
