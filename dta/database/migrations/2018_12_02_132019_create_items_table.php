<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('hsn_code')->nullable();
            $table->float('price','10','2')->nullable();
            $table->integer('qty')->default(0);
            $table->tinyInteger('status')->default(\App\Models\Item::ACTIVE)->comment('0: In-Active, 1: Active');
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
        Schema::dropIfExists('items');
    }
}
