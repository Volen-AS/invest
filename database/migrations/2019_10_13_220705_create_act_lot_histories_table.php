<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActLOtHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('act_lot_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_transaction_au')->index();
            $table->date('emission_period');
            $table->decimal('amount_token_lot');
            $table->mediumInteger('seller_u_id');
            $table->decimal('start_price');
            $table->text('previous_price');
            $table->mediumInteger('previous_price_user');
            $table->text('lider_price');
            $table->mediumInteger('lider_price_user');
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
        Schema::dropIfExists('act_lot_histories');
    }
}
