<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model 
{

    protected $guarded = [];
    protected $table = 'classes';
    public $timestamps = true;

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function semester()
    {
        return $this->belongsTo('App\Models\Semester');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function year()
    {
        return $this->belongsTo('App\Models\Year');
    }

        public function news()
    {
        return $this->hasMany('App\Models\NewsAnnouncements','class_id');
    }

    public function lectures_attendance()
    {
        return $this->hasMany('App\Models\Lecture','class_id')->Select('id','class_id', 'date')->Where('date', date('Y-m-d'));
    }


    

}