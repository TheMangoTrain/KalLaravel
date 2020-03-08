<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrintSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_sheet', function (Blueprint $table) {
            $table->integer('ps_id')->unsigned()->primary();
            $table->enum('type', ['ecom', 'test'])->default('ecom')->collation('utf8_unicode_ci');
            $table->string('sheet_url', 255)->collation('utf8_unicode_ci');
            $table->timestamp('created_at')->useCurrent()->index();
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
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
