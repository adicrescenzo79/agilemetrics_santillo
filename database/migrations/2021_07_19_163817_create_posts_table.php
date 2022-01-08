<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->id();
          $table->unsignedBigInteger("user_id");
          $table->string('title');
          $table->text('content');
          $table->string('slug')->unique();
          $table->unsignedBigInteger('category_id')->nullable();
          $table->text('cover')->nullable();
          $table->string('visibility');
          $table->timestamps();

          $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");


        $table->foreign('category_id')
        ->references('id')
        ->on('categories')
        ->onDelete('set null');


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
