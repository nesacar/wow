<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('seotitle')->nullable();
            $table->string('seokeywords')->nullable();
            $table->text('short')->nullable();
            $table->integer('parent')->nullable()->default(0);
            $table->integer('level')->nullable()->default(1);
            $table->integer('order')->default(1);
            $table->integer('featured')->default(0);
            $table->string('image')->nullable();
            $table->text('map')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
