<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTblCompdataNewcolumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compdatas', function($table)
        {
            $table->integer('cpumin');
            $table->integer('cpumax');
            $table->integer('tempmin');
            $table->integer('tempmax');
            $table->integer('rammin');
            $table->integer('rammax');
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
