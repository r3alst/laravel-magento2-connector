<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateM2storeWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m2store_webhooks', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("m2store_id");
            $table->string("entity_type", 50);
            $table->string("entity_id", 20);
            $table->string("event_type", 50);
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('m2store_webhooks');
    }
}
