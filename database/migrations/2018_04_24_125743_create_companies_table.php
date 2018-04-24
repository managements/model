<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',50);
            $table->string('licence',100);
            $table->string('address',100);
            $table->string('build',10);
            $table->string('floor',10);
            $table->string('aprt_nbr',10);
            $table->string('zip',20);
            $table->string('city',45);
            $table->string('speaker',45);
            $table->string('range',45);
            $table->dateTime('limit')->nullable();
            $table->boolean('status')->default(false);
            $table->string('turnover',45);
            $table->string('logo')->unique();
            $table->string('cover')->unique();
            $table->string('taxes',45)->nullable();

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
        Schema::dropIfExists('companies');
    }
}
