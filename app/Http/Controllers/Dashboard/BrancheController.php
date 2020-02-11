<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branche;
class BrancheController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $branches = Branche::all();
    return view('dashboard.branches.index',compact('branches'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('dashboard.branches.create');
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
      'emailOfBranch' => ['required', 'string', 'max:255'],
      'phoneNumber' => ['required', 'string', 'max:255'],
      'location' => ['required', 'string', 'max:255'],
      'country' => ['required', 'string', 'max:255'],
      'mangerFullName' => ['required', 'string', 'max:255'],
      'mangerPhoneNumber' => ['required', 'string', 'max:255'],
      'mangerEmail' => ['required', 'string', 'max:255'],
      'status' => ['required', 'integer'],
    ]);

    Branche::create($request->all());
    return redirect('/branche');
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
    $data = Branche::findOrfail($id);
    return view('dashboard.branches/edit', compact('data'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $branche = Branche::findOrfail($id);
    $branche->update($request->all());
    
    return redirect('/branche');
  }

  public function active ($id){

    $activity = '1';
    Branche::whereId($id)->update([
      'status' => $activity,
    ]);
  return redirect()->back();
    
  }

  public function unactive ($id){

    $unactivity = '0';
    Branche::whereId($id)->update([
      'status' => $unactivity,
    ]);
  return redirect()->back();
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    Branche::destroy($id);
    return redirect()->back();
  }
  
}

?>