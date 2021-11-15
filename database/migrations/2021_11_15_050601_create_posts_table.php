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

            $table
                ->bigInteger('user_id')
                ->unsigned();

            $table->string('slug')->unique();
            $table->string('title');
            $table->string('summary');
            $table->text('content');
            $table->dateTime('has_published')->nullable();
            $table->date('expired_at')->nullable();
            $table->date('scheduled_at')->nullable();

            $table->timestamps();

            $table
                ->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
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
