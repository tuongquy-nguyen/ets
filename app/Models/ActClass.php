<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActClass extends Model
{
    protected $table = 'actclasses';

    protected $fillable = [
        'name',
        'faculty_id',
        'teacher_id',
    ];
    

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    
}
