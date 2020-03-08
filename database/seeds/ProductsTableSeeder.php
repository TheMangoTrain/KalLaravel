<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
        

        DB::table('products')->insert([
            'title' => "Product 1",
            'size' => "1x1",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 2",
            'size' => "2x2",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 3",
            'size' => "3x3",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 4",
            'size' => "1x1",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 5",
            'size' => "4x4",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 6",
            'size' => "5x2",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::table('products')->insert([
            'title' => "Product 7",
            'size' => "2x5",
            'price' =>  random_int(1.00, 10.00),
            'inventory_quantity' => random_int(10, 100)
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }




}
