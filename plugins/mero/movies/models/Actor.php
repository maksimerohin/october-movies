<?php namespace Mero\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mero_movies_actors';

	public $belongsToMany = [
		'movies' =>[
			'Mero\Movies\Models\Movie',
			'table' => 'mero_movies_movies_actors',
			'order' => 'title'
		],
	];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	public $attachOne = [
		'thumbnail' => 'System\Models\File'
	];
}
