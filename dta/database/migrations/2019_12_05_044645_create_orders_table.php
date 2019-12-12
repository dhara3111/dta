<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('payment_intent')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('lead_id')->nullable();
            $table->integer('total_lead')->nullable();
            $table->float('total_amount_of_lead')->nullable();
            $table->string('reason')->nullable();
            $table->longText('description')->nullable();
            $table->string('refund')->default(\App\Models\Order::Not_Refund)->comment('0:Not-Refund, 1:Refund')->nullable();
            $table->tinyInteger('status')->default(\App\Models\Order::IN_ACTIVE)->comment('0:In-Active, 1:Active')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
