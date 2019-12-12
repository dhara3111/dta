<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('total')->nullable();
            $table->float('sgst_per')->nullable();
            $table->float('sgst_count')->nullable();
            $table->float('cgst_per')->nullable();
            $table->float('cgst_count')->nullable();
            $table->float('igst_per')->nullable();
            $table->float('igst_count')->nullable();
            $table->float('courier')->nullable();
            $table->float('final_total')->nullable();
            $table->float('discount_per')->nullable();
            $table->float('discount_total')->nullable();
            $table->float('grand_total')->nullable();
            $table->float('paid_total')->nullable();
            $table->float('remain_total')->nullable();
            $table->tinyInteger('status')->default(\App\Models\Invoice::ACTIVE)->comment('0: In-Active, 1: Active');
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
        Schema::dropIfExists('invoices');
    }
}
