<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model {

	protected $table = 'fileentries';

	protected $fillable = [
        'filename', 'mime', 'type', 'title', 'size', 'views', 'created_at', 'updated_at',
    ];

}
