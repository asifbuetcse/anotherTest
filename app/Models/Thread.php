<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Thread extends Model
{
    
	public $table = "threads";
    

	public $fillable = [
	    "id",
		"details",
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
		"details" => "string"
    ];

	public static $rules = [
	    
	];

}
