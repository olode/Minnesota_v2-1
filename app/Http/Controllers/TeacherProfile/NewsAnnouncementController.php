<?php

namespace App\Http\Controllers\TeacherProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherMaterias;
use App\Models\NewsAnnouncements;
use Illuminate\Support\Facades\DB;

class NewsAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $news = DB::table('news_announcements')
        ->join('teacher_materials', 'teacher_materials.id', 'news_announcements.teacher_material_id')
        ->join('materials', 'materials.id', 'teacher_materials.material_id') 
        ->where('teacher_id', '=', 674180)       
        ->get();
        
        //dd($datas);
        return view('teacher-profile.news-announcements.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = TeacherMaterias::where('teacher_id', '=', 674180)->get();
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

        $request->validate([

            'teacher_material_id'          => ['required', 'integer', 'max:255'],
            'tittle'                       => ['required', 'string', 'max:255'],
            'text'                         => ['required', 'string', 'max:255'],

        ]);

        //dd($request->all());
        NewsAnnouncements::create($request->all());
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
