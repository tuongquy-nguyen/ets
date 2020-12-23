<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function processes()
    {
        return $this->hasMany(Process::class);
    }

    
}
