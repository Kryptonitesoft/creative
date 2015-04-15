<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

    /**
     * teacher has many post relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function posts(){
        return $this->hasMany('App\Models\Post');
    }

}