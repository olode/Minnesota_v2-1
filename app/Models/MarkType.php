<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkType extends Model 
{

    protected $guarded = [];
    protected $table = 'mark_types';
    public $timestamps = true;

    public function material(){
        $this->belongsTo('App\Models\TeacherMaterias');
    }

}