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
            // Thay đổi trường 'tags' thành nullable
            $table->string('tags', 255)->nullable()->change();
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
            // Quay lại không nullable nếu cần
            $table->string('tags', 255)->nullable(false)->change();
        });
    }
};
