<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Many to many relation with post table
     */
	public function posts(){
        return $this->belongsToMany('App\Models\Post');
    }

}
