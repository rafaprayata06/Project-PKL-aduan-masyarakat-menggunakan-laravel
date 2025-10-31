<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('masyarakat')->insert([
            'nik' => '123456789109',
            'nama' => 'King Rafa',
            'username' => 'rafa',
            'password' =>Hash::make('12345'),
            'telp' => '081382340144'
        ]);
        DB::table('masyarakat')->insert([
            'nik' => '98765432321122',
            'nama' => 'Ilham Haikal',
            'username' => 'ilham',
            'password' =>Hash::make('12345'),
            'telp' => '0888877666'
        ]);
        DB::table('masyarakat')->insert([
            'nik' => '393839282910',
            'nama' => 'imanuel afif kristanto',
            'username' => 'afif',
            'password' =>Hash::make('12345'),
            'telp' => '66666699999'
        ]);
    }
}
