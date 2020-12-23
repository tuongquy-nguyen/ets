<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function processes()
    {
        return $this->hasMany(Process::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
}
