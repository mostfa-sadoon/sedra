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
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_number');
            $table->integer('order_id')->nullable()->comment('this refer to order // booking // omravisa // barcode');
            $table->softDeletes();
            $table->enum('type',['order','booking','omra','barcode'])->nullable();
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
