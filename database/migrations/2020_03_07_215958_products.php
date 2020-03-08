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
            $table->bigIncrements('product_id');
            $table->string('title', 100)->default('')->index();
            $table->string('vendor', 50)->nullable(true)->index();
            $table->string('type', 25)->nullable(true)->index();
            $table->string('size', 20)->nullable(true)->index();
            $table->float('price')->default(0);
            $table->string('handle', 75)->nullable(true)->default(NULL);
            $table->integer('inventory_quantity')->default(0);
            $table->string('sku', 30)->nullable(true)->default(NULL)->index();
            $table->string('design_url', 255)->nullable(true)->default(NULL);
            $table->enum('published_state', ['inactive', 'active'])->default('active')->index();
            $table->timestamp('created_at')->useCurrent()->nullable(true)->index();
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
