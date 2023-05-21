<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        [
            'name' => 'Rizka',
            'email' => 'Rizka19si@mahasiswa.pcr.ac.id',
            'password' => Hash::make('12345678'),
            'role' => '1',
        ],
        [
            'name' => 'Ardianto Wibowo',
            'email' => 'ardie@.pcr.ac.id',
            'password' => Hash::make('12345678'),
            'role' => '1',
        ],
        [
            'name' => 'Andini Aisyah',
            'email' => 'andini19si@mahasiswa.pcr.ac.id',
            'password' => Hash::make('12345678'),
            'role' => '3',
        ],
        
    ]);
    }
}
