<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product',45);
            $table->string('ref',45);
            $table->string('tva',45);
            $table->longText('description');
            $table->string('size',45);
            $table->boolean('expired')->default(false);
            $table->string('qt',45);

            $table->integer('category_product_id')->unsigned()->index()->nullable();
            $table->foreign('category_product_id')->references('id')->on('category_products');

            $table->integer('section_id')->unsigned()->index()->nullable();
            $table->foreign('section_id')->references('id')->on('sections');

            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores');

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
        Schema::dropIfExists('products');
    }
}
