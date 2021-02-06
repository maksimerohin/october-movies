<?php namespace Mero\Movies\Models;

use Model;

/**
 * Model
 */
class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mero_movies_genres';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	public $belongsToMany =[
		'movies' =>[
			'Mero\Movies\Models\Movie',
			'table' => 'mero_movies_movies_genres',
			'order' => 'title'
		]
	];
}
