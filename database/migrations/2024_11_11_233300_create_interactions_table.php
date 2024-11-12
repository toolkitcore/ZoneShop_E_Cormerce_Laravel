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
        Schema::create('tbl_interactions', function (Blueprint $table) {
            $table->id(); // Khóa chính mặc định là 'id'
            $table->unsignedBigInteger('user_id'); // Khóa ngoại tham chiếu tới users
            $table->unsignedBigInteger('post_id'); // Khóa ngoại tham chiếu tới tbl_posts
            $table->string('type', 50);
            $table->timestamp('timestamp')->useCurrent();
            $table->timestamps();

            // Định nghĩa khóa ngoại một cách tường minh
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('tbl_posts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_interactions');
    }
};
