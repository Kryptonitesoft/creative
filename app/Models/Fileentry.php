<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Fileentry extends Model {

	protected $table = 'fileentries';
	
	protected $columns = ["id", "link", "type", "title", "size", "description", "isVisible", "views", "created_at", "updated_at"];

	protected $fillable = [
        'link', 'type', 'title', 'size', 'description', 'isVisible', 'views'
    ];

	public function scopeExclude($query,$value = array()) 
	{
	    return $query->select( array_diff( $this->columns,(array) $value) );
	}
}
