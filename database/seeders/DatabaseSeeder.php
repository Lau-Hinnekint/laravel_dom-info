<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
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
        User::factory()     
            ->count(10)     // Creating 10 users 
            ->has(          // Making relation with order
                Order::factory()
                    ->count(3)          // Creating 3 orders per user
                    ->hasAttached(      // Making relation with product
                        Product::factory()->count(5),       // Creating 5 products per Order and create value for pivot between Product and Order
                        ['total_price' => random_int(100, 500), 'total_quantity' => random_int(1,3)]
                    )
            )
            ->create();
    }
}
