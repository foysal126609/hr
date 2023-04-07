<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id')->default(0);
            $table->integer('author_id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('short_description');
            $table->longText('long_description');
            $table->longText('image');
            $table->longText('hit_count');
            $table->tinyInteger('status')->default(1);
            $table->text('post_date')->nullable();
            $table->text('post_timestamp')->nullable();
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
};
