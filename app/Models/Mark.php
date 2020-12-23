<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = [
        'process_id',
        'mark',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

}
