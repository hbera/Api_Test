<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("hits")->default(0);
            $table->string("url");
            $table->string("shortUrl");
            $table->string("user_id");
        });

        Schema::table("urls", function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');

         Schema::table('urls', function(Blueprint $table) {
            $table->dropForeign('user_id'); 
        });


    }
}
