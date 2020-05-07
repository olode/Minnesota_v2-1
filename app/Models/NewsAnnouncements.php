<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAnnouncements extends Model 
{

    protected $guarded = [];
    protected $table = 'news_announcements';
    public $timestamps = true;

    public function class()
    {
        return $this->belongsTo('App\Models\Class');
    }

}