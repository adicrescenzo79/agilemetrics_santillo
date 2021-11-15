<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("article_id");
            $table->string('title');
            $table->text('image');
            $table->tinyInteger('order');
            $table->timestamps();

            $table->foreign("article_id")
            ->references("id")
            ->on("articles")
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
        Schema::dropIfExists('art_contents');
    }
}
