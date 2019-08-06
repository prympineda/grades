<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function grade_level()
    {
        return $this->belongsTo('App\GradeLevel', 'level', 'id');
    }
}
