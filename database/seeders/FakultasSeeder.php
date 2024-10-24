<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            'FMIPA',
        ];

        foreach ($data as $fakultas) {
            Fakultas::create([
                'nama_fakultas' => $fakultas,
            ]);
        }
    }
}
