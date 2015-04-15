<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public function author(){
        return $this->belongsTo('App\Models\Teacher');
    }

    /**
     * post has many comments relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App/Models/Comment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Many to many relation between post and categories
     * pivot table name is 'category_post' laravel automatically detect
     */
    public function categories(){
        return $this->belongsToMany('App/Models/Category');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * a post belongs to archive
     */
    public function archive(){
        return $this->belongsTo('App\Models\Archive');
    }


}
