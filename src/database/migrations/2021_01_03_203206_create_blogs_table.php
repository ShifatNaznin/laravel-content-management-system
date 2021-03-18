<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('category', 200)->nullable();
            $table->string('subcategory', 200)->nullable();
            $table->string('title', 200)->nullable();
            $table->string('sub_title', 200)->nullable();
            $table->string('author', 200)->nullable();
            $table->text('description')->nullable();
            $table->string('post_color', 200)->nullable();
            $table->string('post_status', 200)->nullable();
            $table->string('post_tag', 200)->nullable();
            $table->string('photo', 200)->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
