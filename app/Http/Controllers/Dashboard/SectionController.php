<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Section;

class SectionController extends Controller 
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
    $sections = Section::all();
    return view('dashboard.sections/index', compact('sections'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $stages = Stage::all();
    return view('dashboard.sections/create', compact('stages'));   
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    //dd($request->all());
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'info' => ['required', 'string', 'max:255'],
      'stage_id' => ['required', 'integer', 'max:255'],
    ]);

      Section::create([
        'name' => $request['name'],
        'info' => $request['info'],
        'stage_id' => $request['stage_id'],
      ]);

      return redirect('/section');

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
    $section = Section::findOrfail($id);
    $stages = Stage::all();
    return view('dashboard.sections/edit', compact('section', 'stages'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $section = Section::findOrfail($id);
    $section->update($request->all());

    return redirect('/section');
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Section::destroy($id);
    return redirect()->back();
  }
  
}

?>