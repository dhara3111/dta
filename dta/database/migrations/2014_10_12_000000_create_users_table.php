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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('expertize_in')->nullable();
            $table->string('service_in__city')->nullable();
            $table->string('title')->nullable();
            $table->string('password');
            $table->string('keystring');
            $table->string('api_secret');
            $table->string('api_key');
            $table->tinyInteger('type')->comment('0:Super-Admin, 1:Admin, 2:User, 3:Attorney')->nullable();
            $table->tinyInteger('status')->comment('0:In-Active, 1:Active')->nullable();
            $table->longText('reset_password_token')->nullable();
            $table->dateTime('reset_password_sent_at')->nullable();
            $table->tinyInteger('unlock_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
