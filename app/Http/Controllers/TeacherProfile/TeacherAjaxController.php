<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Stage;
use App\Models\Specialization;
use App\Models\Year;
use DB;
use Illuminate\Support\Facades\Auth;

class TeacherAjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }


    /***********************************************************************
     * 
        All This Part Will Talk About Filtering Students To Assign Thier Courses

    ************************************************************************/
    public function getAjaxSectionsFromStageID($stage_id)
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $sections           = \DB::table('view_teacher_classes')
                                ->Select('section_id', 'section_name')
                                ->Where('stage_id', $stage_id)
                                ->Where('class_teacher_id', $teacherId)
                                ->get()->unique('section_id');

        if($sections == null){

            $sections = 'null';
        }

        return  compact('sections');
    }


    public function getAjaxSpecializationsFromSctionID($section_id)
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $specializations      = \DB::table('view_teacher_classes')
                                ->Select('specialization_id', 'specialization_name')
                                ->Where('section_id', $section_id)
                                ->Where('class_teacher_id', $teacherId)
                                ->get()->unique('specialization_id');
        
        if($specializations == null){

            $specializations = 'null';
        }

        return  compact('specializations');
    }
    
    public function getStudents(Request $request)
    {
        
        $request->validate([
            'stage_id'                         => ['required', 'integer'],
            'section_id'                       => ['required', 'integer'],
            'specialization_id'                => ['required', 'integer'],
            'year_id'                          => ['required', 'integer'],
        ]);
        //dd($request->all());
        $year_id    = $request->year_id;
        $array      = [];
        $students   = \DB::table('view_student_details')->where($array);
        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($value === 'لا توجد معلومات') {
                continue;
            }
            if ($value === 'اختر') {
                continue;
            }
            if ($key === 'year_id') {
                continue;
            }
            $students   = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();

        $teacherId          =   Auth::guard('teacher')->user()->id;
        $stages             = \DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        $materials          = ClassInfo::select('name', 'id', 'semester_id')->where('teacher_id', $teacherId)->get();
        $years              =  Year::all();
        return view('teacher-profile.teacher-profile-students.assign-course-student', compact('students', 'stages', 'materials', 'years', 'year_id'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Students To Assign Thier Courses

    ************************************************************************/


}
