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
            $table->integer('society_id')->unsigned()->index()->nullable();
            $table->integer('post_id')->unsigned()->index()->unique()->nullable();

            $table->rememberToken();

            $table->timestamps();

            $table->foreign('recover_id')->references('id')->on('recovers')->onDelete('cascade');
            $table->foreign('society_id')->references('id')->on('societies');
            $table->foreign('post_id')->references('id')->on('posts');
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
