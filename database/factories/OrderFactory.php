<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

  
        return [
            'order_number' => random_int(1000, 100000),
            'customer_id' => random_int(1000, 100000),


          // add orders_items

          
            // get total price for items
            //$table->float('total_price')->default(0);
   
    
        ];




});
