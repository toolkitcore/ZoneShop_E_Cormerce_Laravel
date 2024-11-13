<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSliderImageToSliderHomeTable extends Migration
{
    public function up()
    {
        Schema::table('tbl_slider_home', function (Blueprint $table) {
            $table->string('slider_image')->nullable(); // Thêm cột slider_image, có thể NULL
        });
    }

    public function down()
    {
        Schema::table('tbl_slider_home', function (Blueprint $table) {
            $table->dropColumn('slider_image'); // Xóa cột slider_image nếu rollback
        });
    }
}
