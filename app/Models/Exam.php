<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model {

	public function results(){
        return $this->hasMany('App\Models\Result');
    }

}
