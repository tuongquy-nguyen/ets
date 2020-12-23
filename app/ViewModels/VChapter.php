<?php

namespace App\ViewModels;

use Illuminate\Database\Eloquent\Model;

class VChapter extends Model
{
    protected $table = 'viewchapters';
    protected $dates = ['start_date', 'end_date'];
}
