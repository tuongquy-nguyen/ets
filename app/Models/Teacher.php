<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Teacher extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'profile',
        'user_id',
        'faculty_id',
        'dob',
        'birthplace',
        'nationality',
        'religion',
        'folk',
        'id_card_no',
        'id_card_date',
        'id_card_place',
        'address',
    ];

    public function actclass()
    {
        return $this->belongsTo(ActClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createNew($email)
    {
        $user = new User();
        return $user->create([
            'email' => $email,
            'password' => Hash::make(explode('@', $email)[0]),
            'role_id' => 2,
        ]);
    }

    public function getLastUser()
    {
        $user = new User();
        $user = $user->latest('id')->first();
        return $user->id;
    }

}
