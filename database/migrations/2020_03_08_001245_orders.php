<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->bigInteger('order_number')->unsigned()->index();
            $table->bigInteger('customer_id')->unsigned()->nullable(true)->default(NULL)->index();
            $table->float('total_price')->default(0);
            $table->string('fulfillment_status', 25)->nullable(true)->default(NULL)->index();
            $table->timestamp('fulfilled_date')->useCurrent()->nullable(true)->default(NULL)->index();
            $table->enum('order_status', ['pending', 'active', 'done', 'cancelled', 'resend'])->nullable(true)->default(NULL);
            $table->integer('customer_order_count')->nullable(true)->default(NULL);        
            $table->timestamp('created_at')->useCurrent()->index();
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable(true)->index();

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
