<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brewery');
            $table->string('style');
            $table->year('year')->nullable();
            $table->float('abv', 4, 2);
            $table->float('value', 8, 2)->nullable();
            $table->date('purchase_date');
            $table->string('purchase_location');
            $table->string('purchase_location_city');
            $table->integer('purchase_location_state')->unsigned();
            $table->foreign('purchase_location_state')->references('id')->on('states');
            $table->string('url_image')->nullable();
            $table->string('url_untappd')->nullable();
            $table->string('url_ratebeer')->nullable();
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
        Schema::dropIfExists('beers');
    }
}
