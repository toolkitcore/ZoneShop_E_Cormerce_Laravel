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
        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_name', 255);
            $table->string('transaction_email', 255);
            $table->string('transaction_phone', 10);
            $table->unsignedBigInteger('pickup_address_id')->nullable();
            $table->unsignedBigInteger('delivery_address_id')->nullable();
            $table->integer('transaction_amount');
            $table->enum('transaction_payment', ['pay_online', 'pay_offline']);
            $table->text('transaction_message');
            $table->integer('transaction_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pickup_address_id')->references('address_id')->on('tbl_address')->onDelete('set null');
            $table->foreign('delivery_address_id')->references('address_id')->on('tbl_address')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_transactions');
    }
};
