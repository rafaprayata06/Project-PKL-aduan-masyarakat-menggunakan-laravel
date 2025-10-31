<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasOrAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'tes',
            'email' => 'tesi@gmail.com',
            'password' =>Hash::make('12345'),
            'telpon'  =>'038394721',
            'level' => 'admin',
            'foto' => 'baba',
        ]);
       
    }
}
