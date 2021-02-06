<?php namespace Mero\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'mero_movies_movies';

	public $belongsToMany = [
		'genres' =>[
			'Mero\Movies\Models\Genre',
			'table' => 'mero_movies_movies_genres',
		    'order' => 'title'
		],
		'genress' =>[
			'Mero\Movies\Models\Genre',
			'table' => 'mero_movies_movies_genres',
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

    public $attachMany = [
    	'gallery' => 'System\Models\File'
    ];
}
