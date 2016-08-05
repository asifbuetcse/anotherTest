<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class Comment extends Model
{
    
	public $table = "comments";
    

	public $fillable = [
	    "id",
		"body",
		"thread_id",
		"user_id",
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
		"body" => "string",
		"thread_id" => "integer",
		"user_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
