<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $timestamp = true;

    public function actclasses()
    {
        return $this->hasMany(ActClass::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class,'parent_id');
    }

}
