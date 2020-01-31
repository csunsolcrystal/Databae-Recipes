<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('rated_amount');
	    $table->unsignedInteger('rated_id'); // recipe id, reply id, etc.
	    $table->string('rated_type', 50); // what type of class (i.e. Reply, Recipe)
            $table->timestamps();

	    $table->unique(['user_id', 'rated_id', 'rated_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
