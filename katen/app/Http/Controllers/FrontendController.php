<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function home(){
        $banner_blog = Blog::where('banner_status' , 1)->get();
        $latest_blogs = Blog::latest()->take(4)->get();
         return view('welcome' , [
            'banner_blog'=>$banner_blog,
            'latest_blogs'=>$latest_blogs,
        ]);
    }
}
