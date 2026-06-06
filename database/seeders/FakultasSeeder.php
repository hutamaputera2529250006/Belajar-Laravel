<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Fakultas = [
            [
                'name' => 'Fakultas Teknik',
                'dekan' => 'Prof. Dr. Ir. Ahmad Budiman, M.T.'
            ],
            [
                'name' => 'Fakultas Ekonomi dan Bisnis',
                'dekan' => 'Prof. Dr. Siti Nurjamah, S.E., M.Si'
            ]
        ];

        fakultas::fillAndInsert($Fakultas);

    }
}
