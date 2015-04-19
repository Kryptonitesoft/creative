<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model {

    protected $fillable = ['title', 'subject', 'class', 'mark_range', 'date'];


	public function results(){
        return $this->hasMany('App\Models\Result');
    }

}
