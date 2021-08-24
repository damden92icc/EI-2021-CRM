<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('description')->default('no description');
            $table->string('reference')->unique();
            $table->date('sended_date')->nullable();
            $table->string('bill_state')->default('DRAFT');              
            $table->double('total_cost_ht')->default(0);  
            $table->double('total_sell_ht')->default(0);  
            $table->integer('validity_delay')->default(30);  
            $table->date('due_date');  
      

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->unsignedBigInteger('concerned_company');
            $table->foreign('concerned_company')->references('id')->on('companies');   
               
       
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
        Schema::dropIfExists('bills');
    }
}
