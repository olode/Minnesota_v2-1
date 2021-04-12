<?php 

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\FollowUpHomework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowUpHomeworkController extends Controller 
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
    $teacherId          = Auth::guard('teacher')->user()->id;
    $stages             = DB::table('view_teacher_classes')->select('stage_id', 'stage_name')->where('class_teacher_id', $teacherId)->get()->unique('stage_id');
    return view('teacher-profile.homeworks.follow-up-homework', compact('stages'));
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

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function markUpdate(Request $request, $id)
  {
    // dd($request->all());
    $homework = FollowUpHomework::Where('student_id', $id)->Where('homework_id', $request->homework_id)->first();
    if($homework == null){

      FollowUpHomework::create([
        'student_id' => $id,
        'homework_id' => $request->homework_id,
        'mark' => $request->mark,
      ]);

    }elseif($homework){

      $homework->student_id = $id;
      $homework->homework_id = $request->homework_id;
      $homework->mark = $request->mark;
      $homework->save() ;
    }

    $new_mark = $request->mark;
    return \compact('new_mark');
  }
  
}

?>