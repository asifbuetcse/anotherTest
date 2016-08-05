<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Character extends Model
{
    
	public $table = "characters";
    

	public $fillable = [
	    "id",
		"name",
		"series_id",
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
		"name" => "string",
		"series_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
