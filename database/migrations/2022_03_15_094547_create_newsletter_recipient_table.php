<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_recipient', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('newsletter_recipients_group_id');
            $table->integer('customer');
            $table->integer('lastmailing');
            $table->integer('lastread');
            $table->string('sw_shops_shop_id');
            $table->foreign('newsletter_recipients_group_id')->references('id')->on('newsletter_recipients_group')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sw_shops_shop_id')->references('shop_id')->on('sw_shops')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('added')->nullable();
            $table->dateTime('double_optin_confirmed')->nullable();
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
        Schema::dropIfExists('newsletter_recipient');
    }
}
