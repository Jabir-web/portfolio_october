<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show
    public function show()
    {
        $users = User::where('status','active')->get();
        return view('admin.user.show',[
            'users' => $users
        ]);
    }
}
