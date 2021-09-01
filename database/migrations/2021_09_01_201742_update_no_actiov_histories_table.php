<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNoActiovHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('no_actiov_histories', function (Blueprint $table) {
            $table->unsignedInteger('seller_u_id')->change();
            $table->unsignedInteger('first_buyer')->change();

            $table->foreign('seller_u_id')->references('id')->on('users');
            $table->foreign('first_buyer')->references('id')->on('users');
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
