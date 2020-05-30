<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\FinalExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalExamController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $finalexams    = FinalExam::all();
    return view('teacher-profile.final_exams.index', compact('finalexams'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $teacherId          = Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.final_exams.create', compact('classes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
    $request->validate([
      'class_id'          => ['required', 'integer', 'max:10'],
      'date'              => ['required', 'date', 'max:20'],
      'title'             => ['required', 'string', 'max:50'],
      'full_mark'         => ['required', 'integer', 'max:255'],
  ]);
  // dd($request->all());
  FinalExam::create($request->all());
    return redirect('/finalexam');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $finalexam          =   FinalExam::findOrfail($id);
    $teacherId          =   Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.final_exams.edit', compact('finalexam', 'classes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $quizze = FinalExam::findOrfail($id);
    $quizze->update($request->all());
        
    return redirect('/finalexam');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    FinalExam::destroy($id);
    return redirect()->back();
  }
  
}

?>