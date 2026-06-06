<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            [    
            'nama_prodi' => 'Pendidikan Dokter',
            'nama_kaprodi'=> 'Dr. Andi Kusuma, Sp.B., M.Kom',
            ],
            [    
            'nama_prodi' => 'Informatika',
            'nama_kaprodi'=> 'Dr. Eko Prasetyo, S.Kom, M.Cs',
            ]
        ];
        foreach($prodis as $prodi){
            $fakultasId = Fakultas::inRandomOrder()->first()->id;

            $prodi['fakultas_id'] = $fakultasId;
            Prodi::create($prodi);
        }
    }
}
