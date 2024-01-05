<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'lokasi' => 'GRD.NET',
    ]);

        Lokasi::create([
            'lokasi' => 'PERMATAASRI.NET',
    ]);

        Lokasi::create([
            'lokasi' => 'MANDALA.NET',
    ]);

        Lokasi::create([
            'lokasi' => 'NDD.NET',
    ]);
    }
}
