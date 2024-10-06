<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 255);
            $table->text('product_description')->nullable();
            $table->decimal('product_price_original', 10, 2);
            $table->decimal('product_price_selling', 10, 2);
            $table->integer('produ  ct_quantity');
            $table->string('product_image', 255)->nullable();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('category_id');
            $table->foreign('brand_id')->references('brand_id')->on('tbl_brand_product');
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product');
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
        Schema::dropIfExists('tbl_product');
    }
};
