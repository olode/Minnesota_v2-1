<?php 

namespace App\Http\Controllers\Dashboard;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
class BrancheController extends Controller 
{

  public function __construct()
    {
      $this->middleware(['auth', 'super-admin']);
    }
    
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $branches = Branch::all();
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
      'name'                 => ['required', 'string', 'max:255'],
      'email_of_branch'      => ['required', 'string', 'max:255'],
      'phone_number'         => ['required', 'string', 'max:255'],
      'location'             => ['required', 'string', 'max:255'],
      'country'              => ['required', 'string', 'max:255'],
      'manger_full_name'     => ['required', 'string', 'max:255'],
      'manger_phone_number'  => ['required', 'string', 'max:255'],
      'manger_email'         => ['required', 'string', 'max:255'],
      'status'               => ['required', 'integer'],
    ]);

    Branch::create($request->all());
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
    $data = Branch::findOrfail($id);
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
    $request->validate([
      'name'                 => ['required', 'string', 'max:255'],
      'email_of_branch'      => ['required', 'email', 'max:255'],
      'phone_number'         => ['required', 'string', 'max:255'],
      'location'             => ['required', 'string', 'max:255'],
      'country'              => ['required', 'string', 'max:255'],
      'manger_full_name'     => ['required', 'string', 'max:255'],
      'manger_phone_number'  => ['required', 'string', 'max:255'],
      'manger_email'         => ['required', 'email', 'max:255'],
      'status'               => ['required', 'integer'],
    ]);
    $branche = Branch::findOrfail($id);
    $branche->update($request->all());
    
    return redirect('/branche');
  }

  public function active ($id){

    $activity = '1';
    Branch::whereId($id)->update([
      'status' => $activity,
    ]);
  return redirect()->back();
    
  }

  public function unactive ($id){

    $unactivity = '0';
    Branch::whereId($id)->update([
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
    Branch::destroy($id);
    return redirect()->back();
  }
  
}

?>