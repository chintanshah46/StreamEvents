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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('event_user_id');
            $table->unsignedBigInteger('subscription_id');
            $table->boolean('has_read')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('event_user_id')->references('id')->on('event_users');
            $table->unique(['event_user_id', 'subscription_id'], 'unique_eventuser_subscription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
};
