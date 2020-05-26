<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\StudentMaterial;
use App\Models\TeacherMaterias;
use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Log;

class CourseAssignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }


    public function assignCourse()
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $stages             = \DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        $years              =  Year::all();
        return view('teacher-profile.teacher-profile-students.assign-course-student', compact('stages', 'years'));

    }
    
    public function assignToCourses(Request $request)
    {
        
        $studentClassCheck     =  $request->validate([
            'student_id'                    => ['required', 'integer', 'max:255'],
            'year_id'                       => ['required', 'integer', 'max:255'],
            'class_id'                      => ['required', 'integer', 'max:255'],
            'semester_id'                   => ['required', 'integer', 'max:255'],
        ]);

        // dd($studentClassCheck);
        $check   = StudentClass::where([
          'student_id'          => $request['student_id'],
          'year_id'             => $request['year_id'],
          'class_id'            => $request['class_id'],
          'semester_id'         => $request['semester_id'],
        ])->first();

        // dd($check);
        if ($check == null) {
            StudentClass::create(request()->all());
        } else {
            
            return redirect()->back()->with('alert', 'تم تعيين هذه المادة مسبقا لنفس الطالب');
        }
        
        // dd(request()->all());
        
        return redirect()->back();

    }


    
}
