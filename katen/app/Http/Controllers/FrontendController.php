<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function home(){
        $banner_blog = Blog::where('banner_status' , 1)->get();
        $latest_blogs = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();

        $sorting = 'views';
        $type = 'DESC';

        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");
         return view('welcome' , [
            'banner_blog'=>$banner_blog,
            'latest_blogs'=>$latest_blogs,
            'recent_blogs'=>$recent_blogs,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    // Category Blog View
    function category_view($id){

        $sorting = 'views';
        $type = 'DESC';

        $latest_blogs = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");
        $category_blogs = Blog::where('category_id' , $id)->get();
        $category_header = Category::find($id);
        $categories = Category::all();
        return view('frontend.category.category_blog' ,[
            'category_blogs'=>$category_blogs,
            'categories'=>$categories,
            'category_header'=>$category_header,
            'latest_blogs'=>$latest_blogs,
            'recent_blogs'=>$recent_blogs,
            'categories'=>$categories,
            'tags'=>$tags,

        ]);
    }

    function tag_view($id){

        $sorting = 'views';
        // $type = 'DESC';

        $latest_blogs = Blog::latest()->take(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");
        $tag_blogs = Blog::whereIn('tags',array($id))->get();
        $tag_header = Tag::find($id);
        $categories = Category::all();
        return view('frontend.tag.tag_blog' ,[
            'tag_blogs'=>$tag_blogs,
            'categories'=>$categories,
            'tag_header'=>$tag_header,
            'latest_blogs'=>$latest_blogs,
            'recent_blogs'=>$recent_blogs,
            'categories'=>$categories,
            'tags'=>$tags,

        ]);
    }

}
