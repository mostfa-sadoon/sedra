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
        Schema::create('usernotifaytranslations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_notification_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('body');
            $table->unique(['user_notification_id', 'locale']);
            $table->foreign('user_notification_id')->references('id')->on('usernotification')->onDelete('cascade');
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
