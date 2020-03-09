<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



       // Reset primary key to 0
       DB::statement('SET FOREIGN_KEY_CHECKS=0');

       // Clear existing rows
       //DB::table('products')->delete();
       DB::table('orders')->truncate();
      
   
        factory(App\Order::class, 50)->create()->each(function ($order) {

            // Making an instance of an order, using factory
            factory(App\Order::class)->make();

            // Making order items
            DB::table('orders_items')->insert([
                'order_id' => $order->id,


                'product_id' => "2",
                'quantity' => "2",
            ]);

            // Making print sheets


            // Making print sheet items
        });
        

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
