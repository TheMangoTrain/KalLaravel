<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id', 20)->nullable(false);
            $table->string('title', 100)->default('')->nullable(false)->index();
            $table->string('vendor', 50)->nullable(true)->index();
            $table->string('type', 25)->nullable(true)->index();
            $table->string('size', 20)->nullable(true)->index();
            $table->float('price')->default(0);
            $table->string('handle', 75);
            $table->integer('inventory_quantity')->default(0)->nullable(false);
            $table->string('sku', 30)->index();
            $table->string('design_url', 255);
            $table->enum('published_state', ['inactive', 'active'])->default('active')->nullable(false)->index();
            $table->timestamp('created_at')->useCurrent()->index();
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
            
            // TODO: This could replace above timestamp lines; it outputs "created_at" and "updated_at" with defaults.
            //$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
