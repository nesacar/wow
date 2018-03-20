<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('verification');
            $table->integer('received')->default(0);
            $table->integer('skip')->nullable()->default(0);
            $table->boolean('send')->default(0);
            $table->boolean('active')->default(0);
            $table->timestamp('last_send')->nullable();
            $table->timestamps();
        });

        Schema::create('banner_newsletter', function(Blueprint $table)
        {
            $table->integer('banner_id')->unsigned()->index();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');

            $table->integer('newsletter_id')->unsigned()->index();
            $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('cascade');

            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('newsletter_post', function(Blueprint $table)
        {
            $table->integer('newsletter_id')->unsigned()->index();
            $table->foreign('newsletter_id')->references('id')->on('newsletters')->onDelete('cascade');

            $table->integer('post_id')->unsigned()->index();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->integer('order')->default(1);
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
        Schema::dropIfExists('newsletters');
        Schema::dropIfExists('banner_newsletter');
        Schema::dropIfExists('newsletter_post');
    }
}
