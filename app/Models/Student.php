<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;


    protected $guard = 'student';

    protected $guarded = [];
    protected $table = 'students';
    public $timestamps = true;

    public function branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

    public function student_classes()
    {
        return $this->hasMany('App\Models\StudentClass');
    }

    public function homeworks()
    {
        return $this->hasMany('App\Models\FollowUpHomework');
    }



}