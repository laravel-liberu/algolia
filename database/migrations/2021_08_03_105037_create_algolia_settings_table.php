<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlgoliaSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('algolia_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('enabled');
            $table->string('app_id')->nullable();
            $table->string('secret')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('algolia_settings');
    }
}
