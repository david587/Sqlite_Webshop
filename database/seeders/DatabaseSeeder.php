<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
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
        $products = Product::factory(50)->create();
        $users = User::factory(20)->create();
        //10different orders, every different order is going to have 1payment and user associated
        $orders = Order::factory(10)
        ->make() //we use make()->we use foreach
        ->each(function($order) use($users){
            //minden order customer idjához hozzáfüzünk egy random usert
            $order->customer_id = $users->random()->id();
        });
    }
}
