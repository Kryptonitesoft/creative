<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model {

	protected $table = "admissions";

    protected $fillable = [
    	'name',
    	'fathers_name',
    	'mothers_name',
    	'schools_name',
    	'class',
    	'version',
    	'sroll',
    	'present_address',
    	'permanent_address',
    	'date_of_birth',
    	'sex',
    	'phone',
    	'email',
    	'image',
        'religion',
        'package'
    ];
}
