<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadRecipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploadrecipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid');
            $table->string('title');
	    $table->string('description');
	    $table->string('steps');
	    $table->string('imagelocation');
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
        Schema::dropIfExists('uploadrecipes');
    }
}
