<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'paket' => '3J',
            'harga' => 2000,
            'durasi' => '3 Jam'
    ]);

        Paket::create([
            'paket' => '5J',
            'harga' => 3000,
            'durasi' => '5 Jam'
    ]);

        Paket::create([
            'paket' => '1H',
            'harga' => 5000,
            'durasi' => '1 Hari'
    ]);

        Paket::create([
            'paket' => '7H',
            'harga' => 20000,
            'durasi' => '7 Hari'
    ]);

        Paket::create([
            'paket' => '1B',
            'harga' => 50000,
            'durasi' => '30 Hari'
    ]);
    }
}
