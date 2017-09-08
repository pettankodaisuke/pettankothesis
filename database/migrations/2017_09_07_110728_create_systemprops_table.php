<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystempropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemprops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pcname');
            $table->string('edition');
            $table->string('processor');
            $table->string('installedram');
            $table->string('systemtype');
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
        Schema::drop('systemprops');
    }
}
