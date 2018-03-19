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
            $table->integer('user_id')->nullable()->default(0);
            $table->integer('category_id')->nullable()->default(0);
            $table->integer('town_id')->nullable()->default(0);
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('short')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('publish_at')->nullable();
            $table->boolean('publish')->nullable();
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
