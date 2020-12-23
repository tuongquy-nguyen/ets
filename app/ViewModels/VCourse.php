<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

class VCourse extends Model
{
    protected $table = 'viewcourses';
    protected $dates = ['start_date', 'end_date'];
}
