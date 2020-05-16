<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Student;
use App\Models\StudentMaterial;
use App\Models\TeacherMaterias;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseAssignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }


    public function assignCourse()
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $stages             = \DB::table('view_student_classes')->where('class_teacher_id', $teacherId)->get()->unique();
        dd($stages);
        return view('teacher-profile.teacher-profile-students.assign-course-student', compact('stages'));

    }
    
    public function showCoursesToAssign($id)
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $student            =   Student::findOrfail($id);
        //dd($student);
        $teacherMaterials    = ClassInfo::where('teacher_id', $teacherId)->get();
        return view('teacher-profile.teacher-profile-students/assign-course/showCoursesToAssign', compact('teacherMaterials', 'student'));

    }

    public function assignStudentToCourses(Request $request)
    {
        $request->validate([
            'student_id'                    => ['required', 'integer', 'max:255'],
            'year_of_add'                   => ['required', 'string', 'max:255'],
            'teacher_material_id'           => ['required', 'integer', 'max:255']
        ]);

        $check = StudentMaterial::where([
            ['student_id', '=',             $request->student_id],
            ['year_of_add', '=',            $request->year_of_add],
            ['teacher_material_id', '=',    $request->teacher_material_id],
        ])->count();
        //dd($check);
        if ($check === 0) {
            StudentMaterial::create($request->all());
            return redirect('teacher-profile-assign-course');

        } else {
            return "<h1 calss='text-center'>your validation is working<h1>";
        }
        


        
        // dd();
        // $teacherId          =   Auth::guard('teacher')->user()->id;

    }

    
}
