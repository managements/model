<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gains', function (Blueprint $table) {
            $table->increments('id');

            $table->string('prince',45);
            $table->string('prince_store',45);

            $table->integer('deal_id')->unsigned()->unique()->index();
            $table->foreign('deal_id')->references('id')->on('deals');

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
        Schema::dropIfExists('gains');
    }
}
