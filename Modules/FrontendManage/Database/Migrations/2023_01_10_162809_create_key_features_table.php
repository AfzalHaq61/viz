<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_features', function (Blueprint $table) {
            $table->id();
            $table->string('key_feature_title')->nullable();
            $table->text('key_feature_subtitle')->nullable();
            $table->string('key_feature_link')->nullable();
            $table->string('key_feature_logo')->nullable();
            $table->boolean('show_key_feature')->nullable();
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
        Schema::dropIfExists('key_features');
    }
}
