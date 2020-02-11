<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Branche;

class StageController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
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
    $branches = Branche::all();
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
      'name' => ['required', 'string', 'max:255'],
      'info' => ['required', 'string', 'max:255'],
      'branche_id' => ['required', 'integer', 'max:255'],
    ]);

    //dd($request->all());

    Stage::create([
      'name' => $request['name'],
      'info' => $request['info'],
      'branche_id' => $request['branche_id']
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
    Stage::destroy($id);
    return redirect()->back();
  }
  
}

?>