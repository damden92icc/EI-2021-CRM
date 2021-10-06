<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuoteDescField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('quotes', function (Blueprint $table) {
          
            $table->text('description')->change();
     
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
