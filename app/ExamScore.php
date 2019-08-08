<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    //
    public function number()
    {
    	return $this->belongsTo('App\ExamScoreNumber', 'exam_score_number', 'id');
    }

    public function student()
    {
    	return $this->belongsTo('App\StudentInfo');
    }
}
