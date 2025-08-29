<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hospital::create([
            'name' => 'Rumah Sakit Mata',
            'address' => 'Jalan Merdeka',
            'email' => 'mata@example.com',
            'telephone' => '0891234567890'
        ]);

        Hospital::create([
            'name' => 'Rumah Sakit Teliga',
            'address' => 'Jalan Hatta',
            'email' => 'telinga@example.com',
            'telephone' => '0891234567891'
        ]);

        Hospital::create([
            'name' => 'Rumah Sakit Tenggorokan',
            'address' => 'Jalan Cicada',
            'email' => 'tenggorokan@example.com',
            'telephone' => '0891234567892'
        ]);
    }
}
