<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\HomeWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentHomeWorkController extends Controller
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
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $homeworks          =   HomeWork::where('teacher_id', $teacherId)->get();
        return view('teacher-profile.homeworks.index', compact('homeworks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $stages             =   DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        return view('teacher-profile.homeworks.create', compact('stages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'stage_id'=> ['required', 'integer'],
            'section_id'=> ['required', 'integer'],
            'class_id'=> ['required', 'integer'],
            'lecture_id'=> ['required', 'integer'],
            'due_date'=> ['required'],
            'title'=> ['required', 'string', 'max:200'],
            'info'=> ['required'],
            'full_mark'=> ['required', 'integer'],
        ]);

        $teacherId          =   Auth::guard('teacher')->user()->id;

        HomeWork::create([
            'stage_id'             => $request['stage_id'],
            'section_id'           => $request['section_id'],
            'class_id'             => $request['class_id'],
            'lecture_id'           => $request['lecture_id'],
            'due_date'             => $request['due_date'],
            'title'                => $request['title'],
            'info'                 => $request['info'],
            'full_mark'            => $request['full_mark'],
            'teacher_id'           => $teacherId,
        ]);

        return redirect('student-home-work');
        // dd($request->all());
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
        $homework           =   HomeWork::findOrfail($id);
        $teacherId          =   Auth::guard('teacher')->user()->id;
        $stages             =   DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
        return view('teacher-profile.homeworks.edit', compact('stages', 'homework'));
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
        $homework = HomeWork::findOrfail($id);
        $homework->update($request->all());
        
        return redirect('student-home-work');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HomeWork::destroy($id);
        return redirect()->back();
    }

    
}
