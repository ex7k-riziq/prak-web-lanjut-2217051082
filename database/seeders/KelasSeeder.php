<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            '2019A',
            '2019B',
            '2019C',
            '2019D',
            '2020A',
            '2020B',
            '2020C',
            '2020D',
            '2021A',
            '2021B',
            '2021C',
            '2021D',
            '2022A',
            '2022B',
            '2022C',
            '2022D',
            '2023A',
            '2023B',
            '2023C',
            '2023D',
            '2024A',
            '2024B',
            '2024C',
            '2024D',
            '2025A',
            '2025B',
            '2025C',
            '2025D',
        ];

        foreach ($data as $kelas) {
            Kelas::create([
                'nama_kelas' => $kelas,
            ]);
        }
    }
}
