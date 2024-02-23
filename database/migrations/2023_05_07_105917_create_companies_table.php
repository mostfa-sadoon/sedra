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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone',25)->nullable();
            $table->string('country_code', 5)->nullable();
            $table->string('email')->nullable();
            $table->string('logo');
            $table->string('password');
            $table->boolean('delete_account')->default(false);
            $table->string('lang', 10);
            $table->boolean('status')->default(false);
            $table->string('otp')->nullable();
            $table->boolean('notify')->default(true);
            $table->double('rate',2,1)->nullable();
            $table->integer('total_rate')->nullable();
            $table->double('balance', 12, 2)->default(0.00);
            $table->Integer('ratings_count')->default(0);
            $table->double('net_profit')->default(0);
            $table->double('total_sales')->default(0);
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
        Schema::dropIfExists('companies');
    }
};
