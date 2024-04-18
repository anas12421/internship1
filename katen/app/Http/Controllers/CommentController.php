<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Tag;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function comment_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'description'=>'required',
        ]);

        Comment::create([
            'blog_id'=>$request->blog_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'description'=>$request->description,
        ]);

        return redirect(url()->previous().'#comments')->with('comment_success' , 'Comment Success');
    }

    function reply($id){

        $comment = Comment::find($id);
        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.reply',[
            'comment'=>$comment,
            'recent_blogs'=>$recent_blogs,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }

    function reply_store(Request $request){
        $blog_id = Blog::find($request->blog_id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'description'=>'required',
        ]);

        Reply::create([
            'comment_id'=>$request->comment_id,
            'blog_id'=>$request->blog_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'website'=>$request->website,
            'description'=>$request->description,
        ]);

        return redirect("blog/single/view/$blog_id->slug".'#comments')->with('reply','Reply Success');
    }
}
