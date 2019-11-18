<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->nullable();
            $table->string('lead_code')->nullable();
            $table->integer('from_id')->nullable();
            $table->longText('to_id')->nullable();
            $table->tinyInteger('visited')->default(\App\Models\Post::Not_Visited)->comment('0:Not_Visited, 1:Visited	');
            $table->tinyInteger('status')->default(\App\Models\Post::ACTIVE)->comment('0: In_Active, 1: Active');

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
        Schema::dropIfExists('posts');
    }
}
