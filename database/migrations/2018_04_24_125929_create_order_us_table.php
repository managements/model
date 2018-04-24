<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_us', function (Blueprint $table) {
            $table->increments('id');

            $table->string('pu',45);
            $table->string('qt',45);
            $table->string('ht',45);
            $table->string('tva',45);
            $table->string('tva_prince',45);
            $table->string('ttc',45);
            $table->string('taxes',45)->nullable();

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products');

            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_us');
    }
}
