<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'name' => 'Galih',
            'address' => 'Jalan Cikwao',
            'telephone' => '0899876543210',
            'hospital_id' => 1
        ]);

        Patient::create([
            'name' => 'Erwin',
            'address' => 'Jalan Ancol',
            'telephone' => '0899876543211',
            'hospital_id' => 2
        ]);

        Patient::create([
            'name' => 'Dika',
            'address' => 'Jalan Gagak',
            'telephone' => '0899876543212',
            'hospital_id' => 3
        ]);

        Patient::create([
            'name' => 'Fikri',
            'address' => 'Jalan Melon',
            'telephone' => '0899876543213',
            'hospital_id' => 3
        ]);
    }
}
