<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Donation;
use App\Models\Follower;
use App\Models\Subscriber;
use App\Models\Merchandise;
use App\Models\MerchandiseSale;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CurrencySeeder::class,
            SubscriptionSeeder::class
        ]);

        Merchandise::factory(50)->create();

        Follower::factory(1000)->create();

        Subscriber::factory(1000)->create();

        Donation::factory(1000)->create();

        MerchandiseSale::factory(1000)->create();
    }
}
