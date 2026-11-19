<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\course;

class student extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'course_id',
        'photo',
        'gender',
        'hobby'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(course::class);
    }
}
