<?php namespace Mero\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMeroMoviesGenres2 extends Migration
{
    public function up()
    {
        Schema::table('mero_movies_genres', function($table)
        {
            $table->string('slug')->nullable();
            $table->string('title', 191)->default('null')->change();
        });
    }
    
    public function down()
    {
        Schema::table('mero_movies_genres', function($table)
        {
            $table->dropColumn('slug');
            $table->string('title', 191)->default('\'null\'')->change();
            $table->timestamp('created_at')->default('NULL')->change();
            $table->timestamp('updated_at')->default('NULL')->change();
            $table->timestamp('deleted_at')->default('NULL')->change();
        });
    }
}
