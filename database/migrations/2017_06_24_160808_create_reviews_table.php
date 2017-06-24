<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('user_id');
            $table->integer('stars');
            $table->boolean('sing_or_mult');
            $table->integer('cleanliness');
            $table->boolean('changing_station');
            $table->boolean('unisex');
            $table->boolean('doors');
            $table->boolean('locks');
            $table->boolean('feel_safe');
            $table->boolean('wifi');
            $table->boolean('customer_only');
            $table->boolean('wheelchair_accessible');
            $table->text('comment');
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
        Schema::dropIfExists('reviews');
    }
}
