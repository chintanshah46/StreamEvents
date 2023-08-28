<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'currecy_code' => 'USD',
            'created_at'   => date('d-m-Y H:i:s',strtotime("-4 months")),
            'updated_at'   => date('d-m-Y H:i:s',strtotime("-4 months"))
        ]);

        Currency::create([
            'currecy_code' => 'CAD',
            'created_at'   => date('d-m-Y H:i:s',strtotime("-4 months")),
            'updated_at'   => date('d-m-Y H:i:s',strtotime("-4 months"))
        ]);
    }
}
