<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class New_Student_Registration extends Model
{
    protected $guard = 'new_student_registrations';

    protected $guarded = [];
    protected $table = 'new_student_registrations';
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
}
