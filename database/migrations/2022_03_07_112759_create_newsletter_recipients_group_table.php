<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsletterRecipientsGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_recipients_group', function (Blueprint $table) {
            $table->id();
            //$table->char('id', 16)->charset('binary')->primary();
            $table->string('name');
            $table->string('sw_shops_shop_id');
            $table->foreign('sw_shops_shop_id')->references('shop_id')->on('sw_shops')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('newsletter_recipients_group');
    }
}
