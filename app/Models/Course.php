<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
