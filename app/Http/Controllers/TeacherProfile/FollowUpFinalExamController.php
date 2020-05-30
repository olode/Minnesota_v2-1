<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\FollowUpFinalExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpFinalExamController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $followupfinalexams = FollowUpFinalExam::all();
    $teacherId          = Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.final_exams.follow-up-finalexam', compact('classes', 'followUpQuizzes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'final_exam_id'      => ['required', 'integer', 'max:20'],
      'student_id'         => ['required', 'integer', 'max:30'],
      'status'             => ['required', 'integer', 'max:2'],
      'mark'               => ['required', 'integer', 'max:255'],
  ]);
      
  $studentCheck   = FollowUpFinalExam::where([

    ['final_exam_id', '=', $request->final_exam_id],
    ['student_id', '=', $request->student_id],

  ])->first();
  
  if (empty($studentCheck)) {

    FollowUpFinalExam::create($request->all());
    return redirect('/followupfinalexam');

  } elseif (!empty($studentCheck)) {

    $followupfinalexam = FollowUpFinalExam::findOrfail($studentCheck->id);
    $followupfinalexam->update($request->all());
        
    return redirect('/followupfinalexam');
  }
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
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>