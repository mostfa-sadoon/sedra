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
        //
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('confirmation')->default(false);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('promocode')->nullable();
            $table->double('price_after_discount')->default(0);
            $table->double('price_before_discount')->default(0);
            $table->Integer('payment_type')->default(0)->comment('1 wallet  2 bank    3 visa');
            $table->Integer('status')->default(1)->comment('1  request is done  // 2 Processing in progress  // 3 delivery in process //   4 completed   // 5 order is rejected // 6 order is canceled by user');
            $table->text('fort_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
