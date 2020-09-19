<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Branch;

class StageController extends Controller 
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

  public function getAjaxStages($branch_id)
  {
    $stages = Stage::Select('id', 'name')->Where('branch_id', $branch_id)->get();
    if($stages == null){
      $stages = 'null';

    }
    return  compact('stages');
  }

  public function index()
  {
    $stages = Stage::all();
    return view('dashboard.stage/index', compact('stages'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $branches = Branch::all();
    return view('dashboard.stage/create', compact('branches'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'name'         => ['required', 'string', 'max:255'],
      'info'         => ['required', 'string'],
      'branch_id'    => ['required', 'integer', 'max:255'],
    ]);

    //dd($request->all());

    Stage::create([
      'name'           => $request['name'],
      'info'           => $request['info'],
      'branch_id'      => $request['branch_id']
    ]);

    return redirect('/stage');

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
    $stage    = Stage::findOrfail($id);
    $branches = Branch::all();
    return view('dashboard.stage.edit', compact('stage', 'branches'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {

    $request->validate([
      'name'         => ['required', 'string', 'max:255'],
      'info'         => ['required', 'string'],
      'branch_id'    => ['required', 'integer', 'max:255'],
    ]);
    $stage    = Stage::findOrfail($id);
    $stage->update($request->all());

    return redirect('/stage');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Stage::destroy($id);
    return redirect()->back();
  }
  
}

?>