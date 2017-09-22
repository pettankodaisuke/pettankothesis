<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEventLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('eventLog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('logType');
            $table->integer('entryType');
            $table->integer('eventid');
            $table->integer('message');
            $table->string('created_at');
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
