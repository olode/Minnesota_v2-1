<?php

namespace App\Http\Controllers\StudentProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Semester;
use App\Models\ClassInfo;
use App\Models\Attendance;
use Auth;
use Str;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $arr = [];
       $toatl_marks =[];
       
       $student = Student::Find(Auth::user()->id);
       $semesters = Semester::Where('specialization_id', $student->specialization_id)->get();

       foreach($student->student_classes->load('class.material') as $material){
          array_push($arr, $material->class->material->hours);
       }

       $taking_hors = array_sum($arr);
       return view('student-profile.students.index', compact('student', 'taking_hors', 'total_marks'));

    }



    public function studentPlan()
    {
        $student = Student::Find(Auth::user()->id);
        $semesters = Semester::Where('specialization_id', $student->specialization_id)->get();
        return view('student-profile.students.plan',compact('student','semesters'));
    }


    public function studentSemesters()
    {
        $student = Student::with(['student_classes'])->Find(Auth::user()->id);
        $semester_materials = "";
        return view('student-profile.students.semesters',compact('student', 'semester_materials'));
    }


    public function studentSemesterMaterials($semester)
    {
        $total_marks =[];
        $student = Student::with(['student_classes'])->Find(Auth::user()->id);
        $semester_materials = StudentClass::with(['lectures.home_work.follow_up_home_work','quizzes', 'final_exams'])->Where('student_id', Auth::user()->id)->Where('semester_id', $semester)->get();
        return view('student-profile.students.semesters',compact('student', 'semester_materials', 'total_marks'));


        // $toatl_marks =[];
        // $student = Student::with(['student_classes'])->Find(Auth::user()->id);
        // $semester_materials = StudentClass::with(['marks'])->Where('student_id', Auth::user()->id)->Where('semester_id', $semester)->get();
        // return view('student-profile.students.semesters',compact('student', 'semester_materials', 'toatl_marks'));
    }

    
    public function studentShowMarks()
    {
        $student = Student::Find(Auth::user()->id);
        return view('student-profile.students.show-marks',compact('student'));
    }

    public function getInClass(Request $request)
    {

        if($request->start <= date('H:i') && $request->end >= date('H:i')){


            $class = ClassInfo::with(['lectures_attendance'])
                                ->Select('id','classroom_url')
                                ->Where('id', $request->id)->First();

                                
            if($class->lectures_attendance->first() == null){


              return  view('student-profile.messages.uncomplate-lecturer');
              

            }


            $check_attendance = Attendance::Where('lecture_id', $class->lectures_attendance->first()->id)
                                            ->Where('attendance', 1)
                                            ->Where('student_id', Auth::user()->id)
                                            ->first();


            if($check_attendance === null){

                $attendance =  new Attendance;
                $attendance->lecture_id = $class->lectures_attendance->first()->id;
                $attendance->attendance = 1;
                $attendance->student_id = Auth::user()->id;
                $attendance->save();

            }


            return  redirect($class->classroom_url);



        }else{

            return  redirect()->back();
        }

    }

    // public function studentShowMaterials()
    // {
    //     $student = Student::Find(Auth::user()->id);
        
    //     return view('student-profile.students.show-materials',compact('student'));
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('profiles.students.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    

    
}
