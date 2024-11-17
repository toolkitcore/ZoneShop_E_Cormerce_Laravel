<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveReviewImageFromTblReviewProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_review_product', function (Blueprint $table) {
            $table->dropColumn('image_url'); // Xóa trường image_url
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_review_product', function (Blueprint $table) {
            $table->string('image_url')->nullable(); // Thêm lại trường image_url nếu rollback
        });
    }
}
