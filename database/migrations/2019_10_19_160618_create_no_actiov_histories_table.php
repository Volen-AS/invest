<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoActiovHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_actiov_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_transaction_au')->index()->nullable();
            $table->date('emission_period')->nullable();
            $table->decimal('amount_token_lot')->nullable();
            $table->mediumInteger('seller_u_id')->nullable();
            $table->decimal('start_price')->nullable();
            $table->mediumInteger('first_buyer')->nullable();
            $table->text('first_price_lot')->nullable();
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
        Schema::dropIfExists('no_actiov_histories');
    }
}
