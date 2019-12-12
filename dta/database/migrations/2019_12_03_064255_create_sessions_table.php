<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('object')->nullable();
            $table->string('billing_address_collection')->nullable();
            $table->string('cancel_url')->nullable();
            $table->string('client_reference_id')->nullable();
            $table->string('customer')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('display_items')->nullable();
            $table->string('livemode')->nullable();
            $table->string('locale')->nullable();
            $table->string('mode')->nullable();
            $table->string('payment_intent')->nullable();
            $table->string('payment_method_types')->nullable();
            $table->string('setup_intent')->nullable();
            $table->string('submit_type')->nullable();
            $table->string('subscription')->nullable();
            $table->string('success_url')->nullable();
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
        Schema::dropIfExists('sessions');
    }
}
