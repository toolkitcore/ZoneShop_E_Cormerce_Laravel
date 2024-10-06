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
        Schema::create('tbl_attributes', function (Blueprint $table) {
            $table->id('attribute_id'); // Primary key
            $table->unsignedInteger('category_id'); // Foreign key to categories table
            $table->string('attribute_name', 255); // Attribute name
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_attibutes');
    }
};
