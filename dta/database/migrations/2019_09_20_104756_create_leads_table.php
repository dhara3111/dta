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
            $table->string('lp_campaign_id')->nullable();
            $table->string('lp_campaign_key')->nullable();
            $table->integer('lp_test')->nullable();
            $table->string('lp_response')->nullable();
            $table->string('leadID')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip_code')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('type_id')->nullable();
            $table->string('valid')->nullable();
            $table->string('comments')->nullable();
            $table->integer('sellable')->nullable();
            $table->string('sold')->nullable();
            $table->string('paid')->nullable();
            $table->string('scrubbed')->nullable();
            $table->string('trash')->nullable();
            $table->string('isTest')->nullable();
            $table->float('CPL')->nullable();
            $table->float('RPL')->nullable();
            $table->string('lp_post_response')->nullable();
            $table->string('created_on_date')->nullable();
            $table->tinyInteger('status')->comment('0:In-Active, 1:Active')->nullable();
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
