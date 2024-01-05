<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Voucher;
use Illuminate\Support\Str;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * 
     * @return array
     */
    
    public function definition()
    {
        return [
            'lokasi' => $this->faker->randomElement(['GRD.NET','PERMATAASRI.NET','MANDALA.NET','NDD.NET']),
            // 'lokasi' => 'GRD.NET',
            'kode_voucher' => str::random(10),
            'paket' => $this->faker->randomElement(['3J','5J','1H','7H','1B']),
            // 'status_voucher' => $this->faker->randomElement(['Available','Pending','Expired'])
            'status_voucher' => 'Available'
        ];
    }
}
