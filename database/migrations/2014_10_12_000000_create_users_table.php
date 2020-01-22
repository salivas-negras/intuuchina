<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surnames');
            $table->string('email', 100)->unique();
            $table->longText('phone_number');
            $table->string('nationality');
            $table->string('program')->nullable();
            $table->string('industry')->nullable();
            $table->string('study')->nullable();
            $table->string('university')->nullable();
            $table->string('type');
            $table->longText('cv')->nullable();
            $table->longText('avatar')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('states');
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
