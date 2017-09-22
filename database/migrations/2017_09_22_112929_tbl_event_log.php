<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblEventLog extends Migration
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
            $table->string('message');
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
