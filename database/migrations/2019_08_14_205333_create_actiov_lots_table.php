<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiovLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actiov_lots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_transaction_au')->index();
            $table->date('emission_period');
            $table->decimal('amount_token_lot');
            $table->mediumInteger('seller_u_id');
            $table->string('start_lot_time');
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
        Schema::dropIfExists('actiov_lots');
    }
}
