<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->string('author', 150)->nullable();
            $table->unsignedInteger('artist_id');
            $table->unsignedInteger('user_id');
            $table->string('source', 50);
            $table->string('path');
            $table->text('lyric')->nullable();
            $table->unsignedInteger('week_view');
            $table->unsignedInteger('month_view');
            $table->unsignedInteger('views');
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
        Schema::dropIfExists('tracks');
    }
}
