<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMeroMoviesMovies extends Migration
{
    public function up()
    {
        Schema::create('mero_movies_movies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('title')->nullable();
            $table->string('genre')->nullable();
            $table->string('year')->nullable();
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mero_movies_movies');
    }
}
