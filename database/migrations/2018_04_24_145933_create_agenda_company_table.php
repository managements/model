<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_company', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('agenda_company');
    }
}
