<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumProjectServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('project_services', function (Blueprint $table) {
            $table->dropColumn('service_state'); 
            $table->dropColumn('payement_state'); 
        });

    
        Schema::table('project_services', function (Blueprint $table) {          
            $table->enum('service_state', ['RUNNING', 'INACTIVE', 'CANCELLATION ASKED', 'PAUSED', 'ARCHIVED']);   
            $table->enum('payement_state', ['PAYED','TO PAY', 'DELAYED', 'BILLABLE']);     
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
