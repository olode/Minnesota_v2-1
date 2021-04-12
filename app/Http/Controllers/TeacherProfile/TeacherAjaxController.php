<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ClassInfo;
use App\Models\FinalExam;
use App\Models\FollowUpFinalExam;
use App\Models\FollowUpHomework;
use App\Models\FollowUpQuizze;
use App\Models\HomeWork;
use App\Models\Lecture;
use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Stage;
use App\Models\ViewStudentClasse;
use App\Models\Specialization;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeacherAjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function getAjaxSectionsFromStageID($stage_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $sections = DB::table('view_teacher_classes')->Select('section_id', 'section_name')->Where('stage_id', $stage_id)->Where('class_teacher_id', $teacherId)->get()->unique('section_id');

        if($sections == null){

            $sections = 'null';
        }

        return  compact('sections');
    }

    public function getAjaxSpecializationsFromSctionID($section_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $specializations = DB::table('view_teacher_classes')->Select('specialization_id', 'specialization_name')->Where('section_id', $section_id)->Where('class_teacher_id', $teacherId)->get()->unique('specialization_id');
        
        if($specializations == null){

            $specializations = 'null';
        }

        return  compact('specializations');
    }

    public function getAjaxSemesterFromSpecializatioID($specialization_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $semesters = DB::table('view_teacher_classes')->Select('semester_id', 'semester_title')->Where('specialization_id', $specialization_id)->Where('class_teacher_id', $teacherId)->get()->unique('semester_id');
        
        if($semesters == null){

            $semesters = 'null';
        }

        return  compact('semesters');
    }

    public function getAjaxClassFromSectionID($section_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classes = DB::table('view_teacher_classes')->Select('class_id', 'class_name')->Where('section_id', $section_id)->Where('class_teacher_id', $teacherId)->get()->unique('class_id');
        
        if($classes == null){

            $classes = 'null';
        }

        return  compact('classes');
    }

    public function getAjaxClassFromSemesterID($semester_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $classes = DB::table('view_teacher_classes')->Select('class_id', 'class_name')->Where('semester_id', $semester_id)->Where('class_teacher_id', $teacherId)->get()->unique('class_id');
        
        if($classes == null){

            $classes = 'null';
        }

        return  compact('classes');
    }

    public function getAjaxLectureFromClassID($class_id)
    {
        
        $lectures = Lecture::Select('id', 'title')->Where('class_id', $class_id)->get();
        
        if($lectures == null){

            $lectures = 'null';
        }

        return  compact('lectures');
    }

    public function getAjaxQuizzeFromClassID($class_id)
    {
        
        $quizzes = Quizze::Select('id', 'title')->Where('class_id', $class_id)->get();
        
        if($quizzes == null){

            $quizzes = 'null';
        }

        return  compact('quizzes');
    }

    public function getAjaxFinalExamFromClassID($class_id)
    {
        
        $finalexams = FinalExam::Select('id', 'title')->Where('class_id', $class_id)->get();
        
        if($finalexams == null){

            $finalexams = 'null';
        }

        return  compact('finalexams');
    }

    public function getAjaxHomeworkFromLectureID($lecture_id)
    {
        
        $homeworks = HomeWork::Select('id', 'title')->Where('lecture_id', $lecture_id)->get();
        
        if($homeworks == null){

            $homeworks = 'null';
        }

        return  compact('homeworks');
    }

    /***********************************************************************
     * 
        All This Part Will Talk About Filtering Students To Assign Thier Courses

    ************************************************************************/
    
    public function getStudents(Request $request)
    {
        
        $request->validate([
            'stage_id' => ['required', 'integer'],
            'section_id' => ['required', 'integer'],
            'specialization_id' => ['required', 'integer'],
            'year_id' => ['required', 'integer'],
        ]);

        //dd($request->all());
        $year_id = $request->year_id;
        $array = [];
        $students = DB::table('view_student_details')->where($array);
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
            $students = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();

        $teacherId = Auth::guard('teacher')->user()->id;
        $stages = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        $materials = ClassInfo::select('name', 'id', 'semester_id')->where('teacher_id', $teacherId)->get();
        $years = Year::all();
        return view('teacher-profile.teacher-profile-students.assign-course-student', compact('students', 'stages', 'materials', 'years', 'year_id'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Students To Assign Thier Courses

    ************************************************************************/


    /***********************************************************************
     * 
        All This Part Will Talk About Filtering Teacher Students 

    ************************************************************************/
    
    public function getTeacherStudents(Request $request)
    {
        
        $request->validate([
            'stage_id' => ['required', 'integer'],
        ]);

        // dd($request->all());

        $array = [];
        $students = DB::table('view_student_classes')->where($array);
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
            $students = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();
        // dd($students);
        $teacherId = Auth::guard('teacher')->user()->id;
        $stages = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        return view('teacher-profile.teacher-profile-students.index', compact('students', 'stages'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Teacher Students

    ************************************************************************/

    /***********************************************************************
     * 
        All This Part Will Talk About Filtering Lecture Students 

    ************************************************************************/
    
    public function getLectureStudents(Request $request)
    {
       
        $request->validate([
            'stage_id'=> ['required', 'integer'],
            'section_id'=> ['required', 'integer'],
            'semester_id'=> ['required', 'integer'],
            'class_id'=> ['required', 'integer'],
            'lecture_id'=> ['required', 'integer'],
        ]);

        $lecture_id = $request->lecture_id;
        

        $array = [];
        $students = DB::table('view_student_classes')->where($array);
        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($key === 'lecture_id') {
                continue;
            }
            if ($value === 'لا توجد معلومات') {
                continue;
            }
            if ($value === 'اختر') {
                continue;
            }
            $students = $students->Where($key, '=', $value);
        }
        $students = $students->get();

        // $students   = DB::table('view_student_classes')->Where('class_id', $request->class_id)->get();
        // dd($students, $request->class_id);
        // dd($key, $value, $students, $request->all());
        $teacherId = Auth::guard('teacher')->user()->id;
        $stages = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        $attendances = Attendance::all();
        return view('teacher-profile.lectures-attendance.attendance', compact('students', 'stages', 'lecture_id', 'attendances'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Lecture Students

    ************************************************************************/


    /***********************************************************************
     * 
        All This Part Will Talk About Filtering Lecture Students 

    ************************************************************************/
    
    public function getHomeworkStudents(Request $request)
    {
        
        $request->validate([
            'stage_id'=> ['required', 'integer'],
            'section_id'=> ['required', 'integer'],
            'class_id'=> ['required', 'integer'],
            'lecture_id'=> ['required', 'integer'],
            'homework_id'=> ['required', 'integer'],
        ]);

        $homework_id = (int)$request->homework_id;
        

        $array = [];
        // $students =  DB::table('view_student_classes')->where($array);
        $students =  ViewStudentClasse::With(['homeworks'])->where($array);

        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($key === 'homework_id') {
                continue;
            }
            if ($key === 'lecture_id') {
                continue;
            }
            if ($value === 'لا توجد معلومات') {
                continue;
            }
            if ($value === 'اختر') {
                continue;
            }
            $students = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();

        
        $home_work_title = Homework::find($request->homework_id)->title;
        $teacherId = Auth::guard('teacher')->user()->id;
        $stages = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        return view('teacher-profile.homeworks.follow-up-homework', compact('students', 'stages', 'homework_id', 'home_works', 'home_work_title'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Class Students

    ************************************************************************/

    public function getClassStudentsForQuizze(Request $request)
    {
        
        $request->validate([
            'class_id'=> ['required', 'integer'],
            'quizze_id'=> ['required', 'integer'],
        ]);

        $quizze_id   = $request->quizze_id;
        

        $array = [];
        $students = DB::table('view_student_classes')->where($array);
        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($key === 'class_id') {
                continue;
            }
            if ($key === 'quizze_id') {
                continue;
            }
            $students = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();
        // dd($students);
        $teacherId = Auth::guard('teacher')->user()->id;
        $classes = ClassInfo::where('teacher_id', $teacherId)->get();
        $followUpQuizzes = FollowUpQuizze::all();
        return view('teacher-profile.quizzes.follow-up-quizzes', compact('students', 'classes', 'quizze_id', 'followUpQuizzes'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Class Students 

    ************************************************************************/

     /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Class Students

    ************************************************************************/

    public function getClassStudentsForFinalExam(Request $request)
    {
        
        $request->validate([
            'class_id' => ['required', 'integer'],
            'final_exam_id' => ['required', 'integer'],
        ]);

        $final_exam_id   = $request->final_exam_id;
        

        $array = [];
        $students = DB::table('view_student_classes')->where($array);
        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            if ($key === 'class_id') {
                continue;
            }
            if ($key === 'final_exam_id') {
                continue;
            }
            $students = $students->Where($key, '=', $value);
        }
        
        $students = $students->get();
        // dd($students);
        $teacherId = Auth::guard('teacher')->user()->id;
        $classes= ClassInfo::where('teacher_id', $teacherId)->get();
        $followupfinalexams = FollowUpFinalExam::all();
        return view('teacher-profile.final_exams.follow-up-finalexam', compact('students', 'classes', 'final_exam_id', 'followupfinalexams'));
       
    }

    /***********************************************************************
     * 
        All This Part Above Were Talking About Filtering Class Students

    ************************************************************************/
}
