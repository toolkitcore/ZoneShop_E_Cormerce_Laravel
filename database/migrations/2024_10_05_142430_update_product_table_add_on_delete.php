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
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);

            $table->foreign('brand_id')
                ->references('brand_id')->on('tbl_brand_product')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('category_id')->on('tbl_category_product')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            // Xóa ràng buộc khóa ngoại có onDelete
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);

            // Thêm lại khóa ngoại không có onDelete
            $table->foreign('brand_id')
                ->references('brand_id')->on('tbl_brand_product');

            $table->foreign('category_id')
                ->references('category_id')->on('tbl_category_product');
        });
    }
};
