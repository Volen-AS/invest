<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateActLotHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('act_lot_histories', function (Blueprint $table) {
            $table->unsignedInteger('seller_u_id')->change();
            $table->unsignedInteger('previous_price_user')->change();
            $table->unsignedInteger('lider_price_user')->change();

            $table->foreign('seller_u_id')->references('id')->on('users');
            $table->foreign('previous_price_user')->references('id')->on('users');
            $table->foreign('lider_price_user')->references('id')->on('users');
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
}
