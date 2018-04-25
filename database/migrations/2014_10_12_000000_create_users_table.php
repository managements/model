<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('is_admin')->nullable();
            $table->string('profil')->nullable();
            $table->string('cover')->nullable();

            $table->integer('recover_id')->unsigned()->index()->unique()->nullable();
            $table->foreign('recover_id')->references('id')->on('recovers');

            $table->integer('post_id')->unsigned()->index()->unique()->nullable();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
