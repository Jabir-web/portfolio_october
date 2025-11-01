<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $banner = Banner::where('status', 'active')->get();
        $project = Project::where('status', 'active')->orderBy('id', 'desc')->paginate(6);
        return view('welcome',[
            'banners' => $banner,
            'projects' => $project,
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }
}
