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

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}