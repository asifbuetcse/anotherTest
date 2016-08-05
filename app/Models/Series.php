<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Series extends Model
{

	public $table = "series";


	public $fillable = [
	    "id",
		"name",
		"created_at",
		"updated_at"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"name" => "string"
    ];

	public static $rules = [

	];

}
