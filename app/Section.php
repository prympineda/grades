<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
//  protected $fillable = ['grade_level', 'name'];

    public function grade_level()
    {
        return $this->belongsTo('App\GradeLevel', 'level', 'id');
    }

    public function students()
    {
    	return $this->hasMany('App\StudentInfo', 'section_id');
    }


}
