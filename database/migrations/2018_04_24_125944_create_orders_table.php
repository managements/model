<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ht',45);
            $table->string('tva',45);
            $table->string('tva_prince',45);
            $table->string('ttc',45);
            $table->string('bl');
            $table->string('fc');
            $table->boolean('buy')->default(false);
            $table->boolean('sale')->default(false);

            $table->integer('deal_id')->unsigned()->index();
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->integer('trade_id')->unsigned()->index();
            $table->foreign('trade_id')->references('id')->on('trades');

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
        Schema::dropIfExists('orders');
    }
}
