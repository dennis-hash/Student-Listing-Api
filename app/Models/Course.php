<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function profile()
    {
        return $this->hasMany('App\Models\Profile'::class, 'course_id');
    }
}
