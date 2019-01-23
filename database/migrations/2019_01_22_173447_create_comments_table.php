<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('likes');
            $table->timestamps();
        });

        Schema::table('comments', function (Blueprint $table)
        {
            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_post_id_foreign');
            $table->dropColumn('post_id');

            $table->dropForeign('comments_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('comments');
    }
}
