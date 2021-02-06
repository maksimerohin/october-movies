<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMeroMoviesMoviesActors extends Migration
{
    public function up()
    {
        Schema::rename('mero_movies_mivies_actors', 'mero_movies_movies_actors');
    }
    
    public function down()
    {
        Schema::rename('mero_movies_movies_actors', 'mero_movies_mivies_actors');
    }
}
