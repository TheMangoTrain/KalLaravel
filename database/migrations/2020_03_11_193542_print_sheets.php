<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrintSheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_sheets', function (Blueprint $table) {
            $table->increments('ps_id');
            $table->enum('type', ['ecom', 'test'])->default('ecom')->collation('utf8_unicode_ci');
            $table->string('sheet_url', 255)->collation('utf8_unicode_ci');
            $table->timestamp('created_at')->useCurrent()->index();

            //This is failing on Heroku's mysql add-on (ClearDB)
            //$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
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
