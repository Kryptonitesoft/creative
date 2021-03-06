<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

    protected $fillable = [
        'sroll', 'name', 'mark', 'exam_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Inverse relation of exam model
     */
	public function exam(){
        return $this->belongsTo('App\Models\Exam');
    }

}
