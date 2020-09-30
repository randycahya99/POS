<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('product_code', 10);
            $table->string('product_name', 100);
            $table->string('product_brand', 50);
            $table->integer('stock');
            $table->integer('purchase_price');
            $table->integer('selling_price');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
