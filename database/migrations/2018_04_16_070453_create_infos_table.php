<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name', 15)->nullable();
            $table->string('last_name', 15)->nullable();
            $table->date('dtn')->nullable();
            $table->string('sex',10)->nullable();
            $table->string('address',100)->nullable();
            $table->string('house_nbr',10)->nullable();
            $table->string('city',50)->nullable();

            $table->integer('user_id')->unsigned()->index()->unique();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('infos');
    }
}
