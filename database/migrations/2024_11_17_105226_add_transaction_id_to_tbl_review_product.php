<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionIdToTblReviewProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_review_product', function (Blueprint $table) {
            // Thêm cột transaction_id
            // $table->unsignedBigInteger('transaction_id')->nullable();

            // Thiết lập khóa ngoại
            $table->foreign('transaction_id')->references('transaction_id')->on('tbl_transactions')->onDelete('cascade');
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
            // Xóa khóa ngoại và cột transaction_id
            $table->dropForeign(['transaction_id']);
            $table->dropColumn('transaction_id');
        });
    }
}
