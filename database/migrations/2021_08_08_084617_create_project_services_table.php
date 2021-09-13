<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_services', function (Blueprint $table) {
            $table->id();

            // Field qt + price
            $table->integer('quantity');
            $table->double('unit_cost_ht')->nullable();
            $table->double('unit_sell_ht');

            // Additional info
            $table->boolean('is_active');
            $table->string('service_state');
            $table->date('start_date');           
            $table->date('last_payement_date')->nullable();
            $table->string('payement_state')->nullable();
            $table->string('recurrency_payement')->nullable();
            $table->date('next_payement_date');
            $table->boolean('is_billable')->default(0);
            $table->boolean('is_pay')->nullable();


            // FK field
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');            
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');      
            
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
        Schema::dropIfExists('project_services');
    }
}
