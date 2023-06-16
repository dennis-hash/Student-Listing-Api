<?php

namespace App\Http\Controllers;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
           // Get all students
    $students = Students::with('profile.course')->get(['id', 'fname', 'mname', 'lname']);


    $students = $students->map(function ($student) {
        return [
            'id' => $student->id,
            'fname' => $student->fname,
            'mname' => $student->mname,
            'lname' => $student->lname,
            'registration_no' => $student->profile->registration_no,
            'email' => $student->profile->email,
            'year' => $student->profile->year,
            'course_name' => $student->profile->course->course_name,
        ];
    });

    // Return the modified students data
    return $students;
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get the student with the specified ID and eager load the related profile and course
    $student = Students::with('profile.course')->find($id);

    if (!$student) {
        return response()->json(['error' => 'Student not found'], 404);
    }

    
    $student = [
        'id' => $student->id,
        'fname' => $student->fname,
        'mname' => $student->mname,
        'lname' => $student->lname,
        'registration_no' => $student->profile->registration_no,
        'email' => $student->profile->email,
        'year' => $student->profile->year,
        'course_name' => $student->profile->course->course_name,
    ];

    
    return response()->json(['student' => $student]);
    }

   
}
