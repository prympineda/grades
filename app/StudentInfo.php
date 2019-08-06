<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    //
    public function user()
    {
    	// return $this->belongsTo('App\User');
    	return $this->belongsTo('App\User');

    }

    public function section()
    {
    	return $this->belongsTo('App\Section');
    }
}
