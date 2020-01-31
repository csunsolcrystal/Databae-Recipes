<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FavoriteRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('favorite_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
			$table->unsignedInteger('favorited_id'); // recipe id, reply id, etc.
			$table->string('favorited_type', 50); // what type of class (i.e. Reply, Recipe)
            $table->timestamps();

	    $table->unique(['user_id', 'favorited_id', 'favorited_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_recipes');
    }
}
