<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrintSheetItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_sheet_items', function (Blueprint $table) {
            $table->bigIncrements('psi_id');
            $table->integer('ps_id')->unsigned()->index();
            $table->foreign('ps_id')->references('ps_id')->on('print_sheets')->onDelete('cascade');
            $table->bigInteger('order_item_id')->unsigned();
            $table->foreign('order_item_id')->references('order_item_id')->on('order_items')->onDelete('cascade');
            $table->enum('status', ['pass', 'reject', 'complete'])->default('pass')->collation('utf8_unicode_ci')->index();
            $table->string('image_url', 255)->collation('utf8_unicode_ci');
            $table->string('size', 20);
            $table->integer('x_pos');
            $table->integer('y_pos');
            $table->integer('width');
            $table->integer('height');
            $table->string('identifier')->collation('utf8_unicode_ci');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
