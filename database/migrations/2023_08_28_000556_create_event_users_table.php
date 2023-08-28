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
        Schema::create('event_users', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['user_id'],'index_user_id_eventuser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_users');
    }
};
