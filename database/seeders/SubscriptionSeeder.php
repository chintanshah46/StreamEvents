<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscription::create([
            'name'          => 'Tier 1',
            'price'         => 5.00,
            'is_active'     => 1,
            'created_at'    => date('d-m-Y H:i:s',strtotime("-4 months")),
            'updated_at'    => date('d-m-Y H:i:s',strtotime("-4 months"))
        ]);

        Subscription::create([
            'name'          => 'Tier 2',
            'price'         => 10.00,
            'is_active'     => 1,
            'created_at'    => date('d-m-Y H:i:s',strtotime("-4 months")),
            'updated_at'    => date('d-m-Y H:i:s',strtotime("-4 months"))
        ]);

        Subscription::create([
            'name'          => 'Tier 3',
            'price'         => 15.00,
            'is_active'     => 1,
            'created_at'    => date('d-m-Y H:i:s',strtotime("-4 months")),
            'updated_at'    => date('d-m-Y H:i:s',strtotime("-4 months"))
        ]);
    }
}
