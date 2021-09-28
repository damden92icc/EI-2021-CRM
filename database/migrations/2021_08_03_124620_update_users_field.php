<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('users', function (Blueprint $table) {    
            $table->string('name', 100)->change();
            $table->string('firstname', 100); 
            $table->string('email', 60)->change();       
            $table->string('password', 100)->change();       
            $table->string('phone',30);
            $table->string('mobile',30);             
            $table->boolean('gdpr_valided')->default(0);
            $table->boolean('cgu_valided')->default(0);
            $table->string('user_state')->default("in aprovement");
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
    }
}
