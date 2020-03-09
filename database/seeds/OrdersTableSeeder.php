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


            // Run this random times, maybe 1-10
                // Make order items
              $id = DB::table('orders_items')->insertGetId([
                    'order_id' => $order->id,

                    // Choose a random product from products
                    'product_id' => "2",
                    
                ]);
                echo $id;

            // Run through all order items
            // Create print sheet items from order items
        /*        DB::table('print_sheet_item')->insert([
                    'order_item_id' => $order->id,

                    // Choose a random product from products
                    'product_id' => "2",
                    
                ]);
*/

            // Making print sheet items
        });
        

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
