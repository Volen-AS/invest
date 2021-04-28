<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('UAH')->nullable();
            $table->decimal('USD')->nullable();
            $table->decimal('LYD')->nullable();
            $table->decimal('RUB')->nullable();
            $table->decimal('CNY')->nullable();
            $table->decimal('INR')->nullable();
            $table->decimal('GBP')->nullable();
            $table->decimal('date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
