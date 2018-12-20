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
            $table->integer('untappd_id');
            $table->string('name');
            $table->string('brewery_name');
            $table->integer('brewery_untappd_id');
            $table->string('beer_label');
            $table->string('style');
            $table->year('year')->nullable();
            $table->float('abv', 4, 2);
            $table->float('value', 8, 2)->nullable();
            $table->float('rating', 3, 2)->nullable();
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
