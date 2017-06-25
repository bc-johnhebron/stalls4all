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
            $table->string('yelp_id');
            $table->integer('stars');
            $table->boolean('sing_or_mult')->nullable();
            $table->integer('cleanliness')->nullable();
            $table->boolean('changing_station')->nullable();
            $table->boolean('unisex')->nullable();
            $table->boolean('doors')->nullable();
            $table->boolean('locks')->nullable();
            $table->boolean('feel_safe')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('customer_only')->nullable();
            $table->boolean('wheelchair_accessible')->nullable();
            $table->text('comment')->nullable();
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
