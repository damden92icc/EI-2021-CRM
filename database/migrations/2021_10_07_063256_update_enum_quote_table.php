<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('quote_state'); 
        });

        Schema::table('quotes', function (Blueprint $table) {
          
            $table->enum('quote_state', ['DRAFT', 'SENT', 'TRAITED','ARCHIVED']);     
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
