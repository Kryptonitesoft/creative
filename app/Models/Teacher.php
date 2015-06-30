<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	protected $table = 'teachers';

	protected $fillable = [
        'name', 'designation', 'title', 'teaches', 'education', 'description', 'image', 'email', 'fb', 'phone'
    ];

    /**
     * teacher has many post relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function posts(){
        return $this->hasMany('App\Models\Post');
    }

}