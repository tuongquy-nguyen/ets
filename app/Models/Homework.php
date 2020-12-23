<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function processes()
    {
        return $this->hasMany(Process::class);
    }
}
