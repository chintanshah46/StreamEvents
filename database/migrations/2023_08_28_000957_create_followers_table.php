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
        Schema::create('followers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('event_user_id');
            $table->boolean('has_read')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('event_user_id')->references('id')->on('event_users');

            $table->index(['event_user_id'],'index_eventuser_followers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
