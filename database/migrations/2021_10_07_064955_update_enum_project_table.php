<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnumProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('project_state'); 
        });

        Schema::table('projects', function (Blueprint $table) {          
            $table->enum('project_state', ['DRAFT','RUNNING','ARCHIVED', 'PAUSED']);     
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
