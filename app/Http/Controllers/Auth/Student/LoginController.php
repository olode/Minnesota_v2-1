<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;


    public function username()
    {
        return 'id';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }


 
    public function loginStudentPortal()
    {

        return view('auth.login-student-portal');

    }

    public function studentLogin(Request $request)
    {

        $this->validate($request, [

            'id'        =>  'required',
            'password'  =>  'required|min:5',

        ]);
        
        $sure = Auth::guard('student')->attempt(['special_student_id' => $request->id, 'password' => $request->password]);
        if ($sure) {

            return redirect()->intended(route('student-profile.index'));

        }

        return redirect()->back()->withInput($request->only('id'));

    }
}
