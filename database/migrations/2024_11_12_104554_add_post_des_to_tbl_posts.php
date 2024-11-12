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
        Schema::table('tbl_posts', function (Blueprint $table) {
            // Thêm trường 'post_des' vào bảng 'tbl_posts'
            $table->text('post_des')->nullable(); // Thêm trường mô tả bài viết
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_posts', function (Blueprint $table) {
            // Xóa trường 'post_des' nếu rollback migration
            $table->dropColumn('post_des');
        });
    }
};
