<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Stage;

class TeacherAjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    
    public function getStudents(Request $request)
    {
        // $students   = Student::where('specialization_id', $request->specialization_id)->where('section_id', $request->stage_id)->get();
        // dd($students);
        //dd($request->all());
        
        $array      = [];
        $students   = Student::where($array);
        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($value === 'لا توجد تخصصات للمرحلة') {
                continue;
            }
            $students   = $students->Where($key, '=', $value);
            
        }
        $students = $students->get();

        $stages = Stage::all();
        return view('teacher-profile.teacher-profile-students.assign-course-student', compact('students', 'stages'));
       
    }
}
