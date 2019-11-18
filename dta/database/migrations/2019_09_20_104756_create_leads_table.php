<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('leadID')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('affiliate_name')->nullable();
            $table->string('campaign_name')->nullable();
            $table->string('sellable')->nullable();
            $table->string('sold')->nullable();
            $table->string('paid')->nullable();
            $table->string('scrubbed')->nullable();
            $table->string('trash')->nullable();
            $table->string('isTest')->nullable();
            $table->float('CPL')->nullable();
            $table->float('RPL')->nullable();
            $table->string('lp_post_response')->nullable();
            $table->string('created_on_date')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
