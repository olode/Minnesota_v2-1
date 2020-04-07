<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;


    protected $guard = 'teacher';
    
    protected $guarded = [];
    protected $table = 'teachers';
    public $timestamps = true;

}