<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string('title');
            $table->string('subtitle');
            $table->text('content_1');
            $table->text('content_2')->nullable();
            $table->text('content_3')->nullable();
            $table->string('slug')->unique();
            $table->tinyInteger('visibility');
            $table->timestamps();

            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
