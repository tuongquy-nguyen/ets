<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Student extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'profile',
        'phone',
        'user_id',
        'actclass_id',
        'dob',
        'birthplace',
        'nationality',
        'religion',
        'folk',
        'id_card_no',
        'id_card_date',
        'id_card_place',
        'student_no',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function actclass()
    {
        return $this->belongsTo(ActClass::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function createNew($email)
    {
        $user = new User();
        return $user->create([
            'email' => $email,
            'password' => Hash::make(explode('@', $email)[0]),
            'role_id' => 0,
        ]);
    }

    public function getLastUser()
    {
        $user = new User();
        $user = $user->latest('id')->first();
        return $user->id;
    }
}
