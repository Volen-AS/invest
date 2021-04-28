<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedTokensFromRefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_tokens_from_refs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction')->unique();
            $table->mediuminteger('u_id');
            $table->mediuminteger('u_id_to');
            $table->decimal('new_token');
            $table->decimal('in_cash');
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
        Schema::dropIfExists('purchased_tokens_from_refs');
    }
}
