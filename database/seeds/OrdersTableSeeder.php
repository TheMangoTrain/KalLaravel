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
       DB::table('products')->truncate();


       // METHOD 1
        $count = 20;
        factory(App\Order::class, $count)->create();
        
        // METHOD 2
        /*
        factory(App\Order::class, 50)->create()->each(function ($order) {
            factory(App\Order::class)->make();
        });
        */

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
