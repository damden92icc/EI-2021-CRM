<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('bill_state'); 
        });

        Schema::table('bills', function (Blueprint $table) {          
            $table->enum('bill_state', ['DRAFT','SENT', 'ISSUED', 'DELAYED', 'PAYED', 'VALIDED','ARCHIVED']);     
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
