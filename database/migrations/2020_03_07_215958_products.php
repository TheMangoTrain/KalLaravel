<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('handle', 75)->nullable(true)->default(null);
            $table->integer('inventory_quantity')->default(0);
            $table->string('sku', 30)->nullable(true)->default(null)->index();
            $table->string('design_url', 255)->nullable(true)->default(null);
            $table->enum('published_state', ['inactive', 'active'])->default('active')->index();
            $table->timestamp('created_at')->useCurrent()->nullable(true)->index();
            
            //This is failing on Heroku's mysql add-on (ClearDB)
            //$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();

            // TODO: Possible to use a one liner to define both CREATED and UPDATED timestamps
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
