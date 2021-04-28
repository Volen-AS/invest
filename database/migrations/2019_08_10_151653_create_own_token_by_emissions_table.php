<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnTokenByEmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('own_token_by_emissions', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('u_id');
            $table->date('date');
            $table->decimal('token_rate');
            $table->decimal('investment');
            $table->decimal('own_token');
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
        Schema::dropIfExists('own_token_by_emissions');
    }
}
