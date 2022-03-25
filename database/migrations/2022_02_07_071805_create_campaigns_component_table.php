<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsComponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('campaigns_component', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('campaigns_component', function (Blueprint $table) {
            $table->binary('id');
            $table->string('name');
            $table->string('x_type');
            $table->string('convert_function');
            $table->text('description');
            $table->string('template');
            $table->string('cls');
            $table->binary('pluginID');
            $table->timestamps();
        });
        //  Schema::create('flights', function (Blueprint $table) {
        //     //$table->id();
           
        // });

//$table->string('uuid')->unique();
//          CREATE TABLE IF NOT EXISTS `s_campaigns_component` (
//   `id`                INT(11)       NOT NULL  AUTO_INCREMENT ,
//   `name`              VARCHAR(255)  NOT NULL,
//   `x_type`            VARCHAR(255) NOT NULL,
//   `convert_function`  VARCHAR(255)  DEFAULT NULL,
//   `description`       TEXT          NOT NULL,
//   `template`          VARCHAR(255)  NOT NULL,
//   `cls`               VARCHAR(255)  NOT NULL,
//   `pluginID`          INT(11)       DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns_component');
    }
}
