<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComplainRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('complainRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img')->nullable();
            $table->string('lat')->nullable();
            $table->string('lang')->nullable();
            $table->string('damages')->nullable();

            $table->integer('complain_id')->unsigned()->nullable();
            $table->foreign('complain_id')->references('id')->on('complains');

            $table->integer('anguryQty')->nullable();
            $table->integer('deathQty')->nullable();
            $table->dateTime('update_at', 0);
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
        //
    }
}
