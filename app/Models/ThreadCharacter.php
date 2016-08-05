<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

class ThreadCharacter extends Model
{
    
	public $table = "thread_characters";
    

	public $fillable = [
	    "id",
		"thread_id",
		"character_id",
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
		"thread_id" => "integer",
		"character_id" => "integer"
    ];

	public static $rules = [
	    
	];

}
