<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMeroMoviesMiviesActors extends Migration
{
    public function up()
    {
        Schema::create('mero_movies_mivies_actors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('movie_id');
            $table->integer('actor_id');
            $table->primary(['movie_id','actor_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mero_movies_mivies_actors');
    }
}
