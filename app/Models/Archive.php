<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model {


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Archive has many post, make sense
     */
	public function posts(){
        return $this->hasMany('App\Models\Post');
    }

}
