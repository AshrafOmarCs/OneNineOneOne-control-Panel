<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('job_id')->nullable();
            $table->dateTime('permessionExpiry')->nullable();

            $table->integer('userType_id')->unsigned()->nullable();
            $table->foreign('userType_id')->references('id')->on('UserTypes');

            $table->integer('department_Id')->unsigned()->nullable();
            $table->foreign('department_Id')->references('id')->on('departments');

            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
