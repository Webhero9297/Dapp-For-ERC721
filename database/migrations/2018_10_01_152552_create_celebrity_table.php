<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelebrityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('player_id');
            $table->string('avatar_image_name');
            $table->string('price');
            $table->string('purchase_price');
            $table->string('origin_wallet_id');
            $table->string('send_fee');
            $table->string('site_fee');
            $table->string('ranking');
            $table->string('ranking');
            $table->string('changes');
            $table->string('owner_id');
            $table->integer('is_published');
            $table->string('mass');
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
        Schema::dropIfExists('celebrities');
    }
}
