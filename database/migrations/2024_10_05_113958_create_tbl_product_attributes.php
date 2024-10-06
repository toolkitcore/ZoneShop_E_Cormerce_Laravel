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
        Schema::create('tbl_product_attributes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('attribute_value', 255);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_id')->references('product_id')->on('tbl_product')->onDelete('cascade');
            $table->foreign('attribute_id')->references('attribute_id')->on('tbl_attributes')->onDelete('cascade');
        });
    }

    /** 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product_attributes');
    }
};
