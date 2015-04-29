<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'name', 'email', 'body', 'post_id', 'created_at', 'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function post(){
        return $this->belongsTo('App\Models\Post');
    }

}
