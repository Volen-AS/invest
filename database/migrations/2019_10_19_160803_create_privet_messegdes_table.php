<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivetMessegdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privet_messegdes', function (Blueprint $table) {
            $table->increments('message_id');
            $table->string('chat_id');
            $table->mediuminteger('u_id');
            $table->mediuminteger('to_uid');
            $table->string('message');
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
        Schema::dropIfExists('privet_messegdes');
    }
}
