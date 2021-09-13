<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_prov_details', function (Blueprint $table) {
            $table->id();
            $table->double('spd_unit_cost_ht');

            // Additional info
            $table->boolean('spd_is_active');
            $table->date('spd_start_date')->nullable();     
            $table->string('spd_recurrency_payement');
            $table->date('spd_last_payement_date')->nullable();
            $table->boolean('spd_is_pay')->nullable();
            $table->string('spd_service_state');            
            $table->string('spd_payement_state')->nullable();
       
          
           // FK field
           $table->unsignedBigInteger('ps_id');
           $table->foreign('ps_id')->references('id')->on('project_services'); 

           
           $table->unsignedBigInteger('provider_id');
           $table->foreign('provider_id')->references('id')->on('companies');      
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_prov_details');
    }
}
