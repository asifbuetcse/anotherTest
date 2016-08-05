<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ThreadUser extends Model
{
    
	public $table = "thread_users";
    

	public $fillable = [
	    "id",
		"user_id",
		"thread_id",
		"character_id",
		"is_participating",
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
		"user_id" => "integer",
		"thread_id" => "integer",
		"character_id" => "integer",
		"is_participating" => "boolean"
    ];

	public static $rules = [
	    
	];

}
