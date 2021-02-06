<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMeroMoviesActors extends Migration
{
    public function up()
    {
        Schema::table('mero_movies_actors', function($table)
        {
            $table->string('slug')->nullable();
            $table->string('name', 191)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('mero_movies_actors', function($table)
        {
            $table->dropColumn('slug');
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
            $table->timestamp('deleted_at')->default('NULL')->change();
            $table->string('name', 191)->default('NULL')->change();
        });
    }
}
