<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request){
        $data = $request->all();

        $blogs = Blog::where(function($q) use ($data){
            if(!empty($data['search_val']) && $data['search_val'] != '' && $data['search_val'] != 'unbdefined'){
                $q->where(function ($q) use ($data){
                    $q->where('title', 'like', '%'.$data['search_val'].'%');
                    $q->orwhere('description', 'like', '%'.$data['search_val'].'%');
                    $q->orwhere('auth_desp', 'like', '%'.$data['search_val'].'%');
                    $q->orwhere('author', 'like', '%'.$data['search_val'].'%');
                });
            }

            if(!empty($data['tag']) && $data['tag'] != '' && $data['tag'] != 'unbdefined'){
                $q->where(function ($q) use ($data){
                    $all = '';
                    foreach(Blog::all() as $blog){
                        $explode = explode(',' , $blog->tags) ;

                        if(in_array($data['tag'] , $explode)){
                            $all .= $blog->id.',';
                        }
                    }
                    $explode2 = explode(',' , $all);
                    $q->find($explode2);
                });
            }

        })->latest()->get();



        $latest_blogs = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");

        return view('frontend.tag.tag_blog' , [
            'blogs'=>$blogs,
            'categories'=>$categories,
            'latest_blogs'=>$latest_blogs,
            'recent_blogs'=>$recent_blogs,
            'tags'=>$tags,
        ]);

    }

}
