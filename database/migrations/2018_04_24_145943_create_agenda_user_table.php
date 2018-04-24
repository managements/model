<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('agenda_id')->unsigned()->index();
            $table->foreign('agenda_id')->references('id')->on('agendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_user');
    }
}
