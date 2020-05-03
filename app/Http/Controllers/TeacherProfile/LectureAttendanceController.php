<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherMaterias;
use App\Models\Lecture;
use App\Models\Stage;
use App\Models\Attendance;
use Image;
use Illuminate\Support\Facades\Auth;

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
        $materials = TeacherMaterias::where('teacher_id', '=', $teacherId)->get();

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
            'material_id'                   => ['required', 'integer', 'max:255'],
            'articleArrangement'            => ['required', 'string', 'max:255'],
            'articleArrangementNumber'      => ['required', 'integer', 'max:255'],
            'date'                          => ['required', 'string', 'max:255'],
            'tittle'                        => ['required', 'string', 'max:255'],
            'about'                         => ['required'],
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
            'material_id'                   => $request['material_id'],
            'articleArrangement'            => $request['articleArrangement'],
            'articleArrangementNumber'      => $request['articleArrangementNumber'],
            'date'                          => $request['date'],
            'tittle'                        => $request['tittle'],
            'about'                         => $aboutneme,
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
        $materials = TeacherMaterias::where('teacher_id', '=', $teacherId)->get();
        return view('teacher-profile.lectures-attendance/edit', compact('lecture', 'materials'));
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
        
        
        //$lectures = Lecture::all()->where('');




        // if (empty($request->all())) {

        //     $materials = TeacherMaterias::where('teacher_id', '=', 674180)->get();

        //     $attendancedata = '';

        //     return view('teacher-profile.lectures-attendance.attendance', compact('materials', , 'attendancedata'));
        
        // }
        // if(!empty($request->material_id))
        // {


            $stages    = Stage::select('id', 'name')->get();
            // $materials = TeacherMaterias::where('teacher_id', '=', 674180)->get();
            return view('teacher-profile.lectures-attendance.attendance', compact('materials', 'stages', 'attendancedata'));
            //d($materials);
            //$lectures = Lecture::all();

            //dd($request->all());
            // $lectureId = $request->lecture_id;

            // $teacherId = $request->teacher_id;

            // $materials = Attendance::where('id', '=', $lectureId)->get();
            
            // $attendancedata = Attendance::findOrfail($lectureId);
            
            // dd($lectureId);

        // }





        //return view('teacher-profile.lectures-attendance.attendance', compact('lectures', 'attendancedata'));

    }
    

    public function absent()
    {
        
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
