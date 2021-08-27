<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOwnTokenByEmission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('own_token_by_emissions', function (Blueprint $table) {
            $table->unsignedInteger('u_id')->change();

            $table->foreign('u_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('own_token_by_emissions', function (Blueprint $table) {
            $table->foreignId('u_id')->constrained();

            $table->integer('u_id')->change();

        });
    }
}
