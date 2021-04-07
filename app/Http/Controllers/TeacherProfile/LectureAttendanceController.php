<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherMaterias;
use App\Models\Lecture;
use App\Models\Stage;
use App\Models\Attendance;
use App\Models\ClassInfo;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LectureAttendanceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::all();
        return view('teacher-profile.lectures-attendance.index', compact('lectures'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $materials = ClassInfo::where('teacher_id', '=', $teacherId)->get();

        return view('teacher-profile.lectures-attendance.create', compact('materials'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'class_id'=> ['required', 'integer', 'max:255'],
            'article_arrangement'=> ['required', 'string', 'max:255'],
            'article_arrangement_number'=> ['required', 'integer', 'max:255'],
            'date'=> ['required', 'date', 'max:255'],
            'title'=> ['required', 'string', 'max:255'],
            'full_mark'=> ['required', 'integer', 'max:255'],
            'about'=> ['nullable'],
        ]);
        
        $aboutneme = '';
        if(request()->hasFile('about')){

            $about = request()->file('about');
            $filename = time() .'.'. $about->getClientOriginalExtension();
            $about->move('uploads/lectures/', $filename);
            $aboutneme = $filename;
        }

        //dd($request->all());
        Lecture::create([
            'class_id'=> $request['class_id'],
            'article_arrangement'=> $request['article_arrangement'],
            'article_arrangement_number'=> $request['article_arrangement_number'],
            'date'=> $request['date'],
            'title'=> $request['title'],
            'full_mark'=> $request['full_mark'],
            'about'=> $aboutneme,
        ]);
        return redirect('/lectures');
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
        $teacherId = Auth::guard('teacher')->user()->id;
        $lecture = Lecture::findOrfail($id);
        $materials = ClassInfo::where('teacher_id', '=', $teacherId)->get();
        return view('teacher-profile.lectures-attendance.edit', compact('lecture', 'materials'));
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
        $lecture = Lecture::findOrfail($id);
        $lecture->update($request->all());
        
        return redirect('/lectures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lecture::destroy($id);
        return redirect()->back();
    }

    public function studentAttendance(Request $request)
    {

        $teacherId          = Auth::guard('teacher')->user()->id;
        $stages             = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        return view('teacher-profile.lectures-attendance.attendance', compact('stages'));
    }
    

    public function preparation(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lecture_id'      => ['required', 'integer', 'max:20'],
            'student_id'      => ['required', 'integer', 'max:30'],
            'attendance'      => ['required', 'string', 'max:30'],
        ]);
            
        $studentCheck   = Attendance::where([
      
          ['lecture_id', '=', $request->lecture_id],
          ['student_id', '=', $request->student_id],
      
        ])->first();
        // dd($studentCheck);
        if (empty($studentCheck)) {
      
            Attendance::create($request->all());
          return redirect('/lecture-attendance');
      
        } elseif (!empty($studentCheck)) {
      
          $followupfinalexam = Attendance::findOrfail($studentCheck->id);
          $followupfinalexam->update($request->all());
              
          return redirect('/lecture-attendance');
        }
    }

    public function downloadAbout($id)
  {
    $file = Lecture::findOrfail($id);
    $d1 = $file->about;
    $pathToFile = public_path(). "/uploads/lectures/" .$d1;
    //dd($pathToFile);
    return response()->download($pathToFile);
  }
    
}
