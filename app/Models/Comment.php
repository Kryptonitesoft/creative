<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * comment belongs to a post, Inverse relation
     */
	public function post(){
        return $this->belongsTo('App\Models\Post');
    }

}
