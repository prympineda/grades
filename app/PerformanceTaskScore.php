<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceTaskScore extends Model
{
    //
    public function number()
    {
    	return $this->belongsTo('App\PerformanceTaskNumber', 'performance_task_number', 'id');
    }

    public function student()
    {
    	return $this->belongsTo('App\StudentInfo');
    }
}
