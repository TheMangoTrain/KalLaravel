<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaltestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('kaltests', function (Blueprint $table) {
            $table->bigIncrements('product_id');
             $table->string('title');
            $table->string('vendor');
            $table->string('type');
            $table->string('size');
            $table->float('price')->default(0);
            $table->string('handle');
            $table->integer('inventory_quantity')->default(0);
            $table->string('sku');
            $table->string('design_url');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kaltests');
    }
}
