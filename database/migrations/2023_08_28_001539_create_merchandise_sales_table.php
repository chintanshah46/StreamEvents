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
        Schema::create('merchandise_sales', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('event_user_id');
            $table->unsignedBigInteger('merchandise_id');
            $table->unsignedBigInteger('currency_id');
            $table->double('amount', 10 , 2);
            $table->boolean('has_read')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('event_user_id')->references('id')->on('event_users');
            $table->foreign('merchandise_id')->references('id')->on('merchandises');
            $table->foreign('currency_id')->references('id')->on('currencies');

            $table->index(['event_user_id', 'merchandise_id', 'currency_id'],'index_eventuser_merchandise_currency');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_sales');
    }
};
