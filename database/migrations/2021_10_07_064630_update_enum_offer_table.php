<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('offer_state'); 
        });

        Schema::table('offers', function (Blueprint $table) {          
            $table->enum('offer_state', ['DRAFT', 'SENT', 'TRAITED', 'UPDATE ASKED','ACCEPTED', 'DECLINED','ARCHIVED']);     
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
