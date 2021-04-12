<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\FinalExam;
use App\Models\FollowUpFinalExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpFinalExamController extends Controller 
{

  public function __construct()
    {
        $this->middleware('auth:teacher');
    }
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
    return view('teacher-profile.final_exams.follow-up-finalexam', compact('classes', 'followupfinalexams'));
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
      'final_exam_id'=> ['required', 'integer'],
      'student_id'=> ['required', 'integer'],
      'status'=> ['integer'],
      'mark'=> ['required', 'integer'],
  ]);




  $new_mark = $request->mark;

  
  $checkMark= FinalExam::findOrfail($request->final_exam_id);
  // dd($checkMark->full_mark);
  if ($request->mark <= $checkMark->full_mark) {

    $studentCheck   = FollowUpFinalExam::where([

      ['final_exam_id', '=', $request->final_exam_id],
      ['student_id', '=', $request->student_id],
  
    ])->first();
    
    if (empty($studentCheck)) {
  
      FollowUpFinalExam::create(['student_id'=>$request->student_id,'mark'=>$request->mark,'final_exam_id'=>$request->final_exam_id]);
      return \compact('new_mark');
  
    } elseif (!empty($studentCheck)) {
  
      $studentCheck->mark = $request->mark; 
      $studentCheck->save();

      
      
      return \compact('new_mark');

    }
  }else{

      $new_mark = 'الدرجة المراد تعيينها اكبر من الدرجة المعينة للإختبار';
      return \compact('new_mark');

      
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