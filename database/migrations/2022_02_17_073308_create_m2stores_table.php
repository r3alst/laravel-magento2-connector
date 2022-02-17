<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateM2storesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m2stores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("store_url", 400);
            $table->string("oauth_consumer_key", 200);
            $table->string("oauth_consumer_secret", 200);
            $table->string("oauth_verifier", 200);
            $table->string("access_token", 200);
            $table->string("access_token_secret", 200);
            $table->integer("status")->default(1);
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
        Schema::dropIfExists('m2stores');
    }
}
