<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo('App\Models\Students'::class, 'student_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course'::class, 'course_id');
    }
}
