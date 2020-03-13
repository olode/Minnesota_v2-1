<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarkType;
use App\Models\TeacherMaterias;

class MarkTypeController extends Controller 
{
  public function __construct()
    {
        $this->middleware('auth');
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $marktypes = MarkType::all();
    return view('dashboard.marks_types/index', compact('marktypes'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $materials = TeacherMaterias::all();
    return view('dashboard.marks_types/create', compact('materials'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'student_mark' => ['required', 'integer', 'max:255'],
      'material_id' => ['required', 'integer', 'max:255'],
    ]);

      //dd($request->all());
    MarkType::create($request->all());

    return redirect('/marktype');
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
    MarkType::destroy($id);

    return redirect('/marktype');
  }
  
}

?>