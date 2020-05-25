<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\NewsAnnouncements;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $ownerType = "2";
        $news = NewsAnnouncements::where('owner_id', $teacherId)
        ->where('owner_type', $ownerType)->get();
        $classes  =  ClassInfo::all()->where('teacher_id', $teacherId);
        return view('teacher-profile.teachres.index', compact('news', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
