<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use session;
use DB;
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
        $this->middleware('guest:teacher');
    }

    // public function username()
    // {
    //     return 'id';
    // }


    public function loginTeacherPortal(){

        return view('auth.login-teacher-portal');
    }

    public function teacherLogin(Request $request)
    {



        $this->validate($request, [

            'id'        =>  'required',
            'password'  =>  'required|min:5',

        ]);
        
        $sure = Auth::guard('teacher')->attempt(['id' => $request->id, 'password' => $request->password]);
        if ($sure) {

            return redirect()->intended(route('teacher-profile.index'));

        }

        return redirect()->back()->withInput($request->only('id'));

        //dd(session('sessionTest'));
        
        // if (!empty(request())) {

        //     request()->validate([
        //         'id'        => ['required', ' string'],
        //         'password'  => ['required'],
        //     ]);

        //     $username = request()->id;
        //     $password = request()->password;
        //     $hashpassword = Hash::make($password);

        //     //dd($hashpassword);

        //     $data = DB::table('teachers')->where('id', $username)->where('password', $hashpassword)->first();
        //     //  $data = Teacher::where([

        //     //     ['id', '=', $username],
        //     //     //['password','=', $hashpassword],

        //     //     ])->first();
                 
        //         // session(['sessionTest'=> $data]);
                
        //         request()->session()->put("TeacherData", $data);
        //         $teachersession = request()->session()->get("TeacherData");
        //         //dd($teachersession);

        //         if ($teachersession) {
        //             return redirect('teacher-profile') ;
        //         }else{
        //             return redirect()->back();
        //         }


        //     //dd($data);

        // }else
        // {
        //     return redirect()->back();
        // }
    }

    public function loginStudentPortal(){

        return view('auth.login-student-portal');

    }
}
