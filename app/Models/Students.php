<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
  
    public function profile()
    {
        return $this->hasOne('App\Models\Profile'::class, 'student_id');
    }
    
}
