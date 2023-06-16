<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all courses
        $courses = Course::all();
        $courses = $courses->map(function ($course) {
            return [
                'id' => $course->id,
                'course_name' => $course->course_name,
            ];
        });
        return $courses;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get the course with the specified ID and eager load the related profiles and students
        $course = Course::with('profile.student')->find($id);

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        
        $students = $course->profile->pluck('student');

        // Modify the response data to include only the required fields
        $students = $students->map(function ($student) {
            return [
                'id' => $student->id,
                'fname' => $student->fname,
                'mname' => $student->mname,
                'lname' => $student->lname,
                'email' => $student->profile->email,
                'year' => $student->profile->year,
            ];
        });

        // Return the list of students for the course
        return response()->json(['students' => $students]);
        }

    
}
