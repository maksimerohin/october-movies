<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMeroMoviesMovies extends Migration
{
    public function up()
    {
        Schema::table('mero_movies_movies', function($table)
        {
            $table->string('slug')->nullable();
            $table->string('title', 191)->default('null')->change();
            $table->string('genre', 191)->default('null')->change();
            $table->string('year', 191)->default('null')->change();
            $table->text('description')->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('mero_movies_movies', function($table)
        {
            $table->dropColumn('slug');
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
            $table->timestamp('deleted_at')->default('NULL')->change();
            $table->string('title', 191)->default('NULL')->change();
            $table->string('genre', 191)->default('NULL')->change();
            $table->string('year', 191)->default('NULL')->change();
            $table->text('description')->default('NULL')->change();
        });
    }
}
