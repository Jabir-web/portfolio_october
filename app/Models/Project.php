<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   
    protected $fillable = [
        'title',
        'image',
        'description',
        'version',
        'level',
        'size',
        'views',
        'likes',
        'downloads',
        'video_link',
        'amount',
        'status',
    ];
}
