<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email',50)->unique();

            $table->integer('company_id')->unsigned()->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('info_id')->unsigned()->index()->nullable();
            $table->foreign('info_id')->references('id')->on('infos');

            $table->integer('deal_id')->unsigned()->index()->nullable();
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
