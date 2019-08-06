<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectAssign extends Model
{
    //
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
    	return $this->belongsTo('App\User');
    }

    public function section()
    {
    	return $this->belongsTo('App\Section');
    }
}
