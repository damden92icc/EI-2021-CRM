<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_services', function (Blueprint $table) {
            $table->id();

            $table->double('total_sp_ht');
            $table->integer('vat_rate');
       
          
            // FK field
            $table->unsignedBigInteger('ps_id');
            $table->foreign('ps_id')->references('id')->on('project_services');             
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills'); 
         
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
        Schema::dropIfExists('bill_services');
    }
}
