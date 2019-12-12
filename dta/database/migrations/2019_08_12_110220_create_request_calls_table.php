<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_calls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('time_to_call')->nullable();
            $table->string('request_info')->nullable();
            $table->tinyInteger('status')->default(\App\Models\RequestCall::UN_APPROVE)->comment('0: Un-Approve, 1: Approve');
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
        Schema::dropIfExists('request_calls');
    }
}
