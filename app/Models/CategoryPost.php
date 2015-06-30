<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model {
    protected $fillable = ['post_id', 'category_id'];
	protected $table = "category_post";
    
    public $timestamps = false;
}
