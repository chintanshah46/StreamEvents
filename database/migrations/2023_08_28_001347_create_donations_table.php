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
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('event_user_id');
            $table->unsignedBigInteger('currency_id');
            $table->double('amount', 10 , 2);
            $table->string('donation_message')->nullable();
            $table->boolean('has_read')->default(0);
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('event_user_id')->references('id')->on('event_users');
            $table->foreign('currency_id')->references('id')->on('currencies');

            $table->index(['event_user_id', 'currency_id'],'index_eventuser_currency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
