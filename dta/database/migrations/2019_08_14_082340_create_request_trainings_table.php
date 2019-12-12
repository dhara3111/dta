<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('day_1')->nullable();
            $table->string('best_time_1')->nullable();
            $table->string('day_2')->nullable();
            $table->string('best_time_2')->nullable();
            $table->string('day_3')->nullable();
            $table->string('best_time_3')->nullable();
            $table->string('topics')->nullable();
            $table->tinyInteger('status')->default(\App\Models\RequestTraining::UN_APPROVE)->comment('0: Un-Approve, 1: Approve');
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
        Schema::dropIfExists('request_trainings');
    }
}
