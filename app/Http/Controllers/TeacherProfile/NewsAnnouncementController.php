<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use App\Models\ClassInfo;
use Illuminate\Http\Request;
use App\Models\TeacherMaterias;
use App\Models\NewsAnnouncements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsAnnouncementController extends Controller
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
        // return $news = DB::table('news_announcements')
        // ->join('teacher_materials', 'teacher_materials.id', 'news_announcements.teacher_material_id')
        // ->join('materials', 'materials.id', 'teacher_materials.material_id') 
        // ->where('teacher_id', '=', $teacherId)       
        // ->get();
        
        return view('teacher-profile.news-announcements.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $materials = ClassInfo::where('teacher_id', '=', $teacherId)->get();
        return view('teacher-profile.news-announcements.create', compact('materials'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $teacherId = Auth::guard('teacher')->user()->id;
        $ownerType = "2";
        $request->validate([

            'class_id'                     => ['required', 'integer', 'max:255'],
            'title'                       => ['required', 'string', 'max:255'],
            'text'                         => ['required', 'string', 'max:255'],

        ]);

        // dd($request->all());
        NewsAnnouncements::create([
            'class_id'                     => $request['class_id'],
            'title'                       => $request['title'],
            'text'                         => $request['text'],
            'owner_id'                     => $teacherId,
            'owner_type'                   => $ownerType,
        ]);
        return redirect('/news-announcements');

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
        $news = NewsAnnouncements::findOrfail($id);
        $teacherId = Auth::guard('teacher')->user()->id;
        $materials = TeacherMaterias::where('teacher_id', '=', $teacherId)->get();
        //return redirect('news-announcements/edit/')->with('materials', 'news');
        return view('teacher-profile.news-announcements/edit', compact('materials', 'news'));
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
        $news = NewsAnnouncements::findOrfail($id);
        $news->update($request->all());

        return redirect('/news-announcements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewsAnnouncements::destroy($id);
        return redirect()->back();
    }
}
