<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    //
    public function subjects()
    {
    	return $this->hasMany('App\Subject', 'level', 'id');
    }
   
}
