<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'classId',
        'sessionId',
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'gender',
        'password',

    ];
}
