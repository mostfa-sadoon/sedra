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
        Schema::create('barcode_templats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone',25);
            $table->string('country_code', 5);
            $table->string('passport');
            $table->string('passport_img');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['pending','accepted','refused'])->default('pending');
            $table->Integer('payment_type')->default(0)->comment('1 wallet  2 bank    3 visa');
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
