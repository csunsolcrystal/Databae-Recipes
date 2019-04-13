<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('user_id');
            $table->string('title');
			$table->string('category');
			$table->string('tags')->nullable();
            $table->text('description');
			$table->text('footnotes')->nullable();
			$table->text('ingredients');
			$table->string('cookTime');
			$table->string('prepTime');
			$table->float('averageRating')->nullable();
	    $table->text('recipe_steps');
	    $table->string('picture')->default('default.jpg');
	    $table->UnsignedInteger('views')->default(0);
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
        Schema::dropIfExists('recipes');
    }
}
