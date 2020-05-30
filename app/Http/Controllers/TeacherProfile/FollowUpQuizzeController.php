<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use App\Models\FollowUpQuizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpQuizzeController extends Controller 
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
    $followUpQuizzes    = FollowUpQuizze::all();
    $teacherId          = Auth::guard('teacher')->user()->id;
    $classes            = ClassInfo::where('teacher_id', $teacherId)->get();
    return view('teacher-profile.quizzes.follow-up-quizzes', compact('classes', 'followUpQuizzes'));
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
      'quizze_id'          => ['required', 'integer', 'max:20'],
      'student_id'         => ['required', 'integer', 'max:30'],
      'status'             => ['required', 'integer', 'max:2'],
      'mark'               => ['required', 'integer', 'max:255'],
  ]);
      
  $studentCheck   = FollowUpQuizze::where([

    ['quizze_id', '=', $request->quizze_id],
    ['student_id', '=', $request->student_id],

  ])->first();
  
  if (empty($studentCheck)) {

    FollowUpQuizze::create($request->all());
    return redirect('/followupquizze');

  } elseif (!empty($studentCheck)) {

    $quizze = FollowUpQuizze::findOrfail($studentCheck->id);
    $quizze->update($request->all());
        
    return redirect('/followupquizze');

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