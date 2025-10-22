<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
        protected $fillable = ['name', 'address', 'message', 'user_id', 'status'];
}
