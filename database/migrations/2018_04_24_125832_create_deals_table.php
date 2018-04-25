<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',45)->unique();
            $table->string('speaker',45);
            $table->string('address');
            $table->string('build',10);
            $table->string('floor',10);
            $table->string('aprt_nbr',10);
            $table->string('city',20);
            $table->string('description');
            $table->string('vote',5);
            $table->boolean('provider')->nullable();
            $table->boolean('client')->nullable();

            $table->integer('company_id')->unsigned()->unique()->index();
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('deals');
    }
}
