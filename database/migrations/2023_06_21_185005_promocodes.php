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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('users_number')->default(0);
            $table->string('code')->nullable();
            $table->double('amount');
            $table->double('percent');
            $table->datetime('start_date');
            $table->datetime('enddate');
            $table->double('min_order_price');
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
