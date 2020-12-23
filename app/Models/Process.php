<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'id',
        'enrollment_id',
        'chapter_id',
        'homework_file',
        'complete_time',
        'status',
    ];

    public function mark()
    {
        return $this->hasOne(Mark::class);
    }

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }


}
