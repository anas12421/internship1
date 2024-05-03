<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    function dashboard() {
        $total_blogs = Blog::all();
        $total_users = User::all();
        $total_subs = Subscriber::all();
        $today_blogs = Blog::where('created_at' , Carbon::today())->get();
        $today_users = User::where('created_at' , Carbon::today())->get();
        $today_subs = Subscriber::where('created_at' , Carbon::today())->get();
        return view('dashboard' , [
            'total_blogs'=>$total_blogs,
            'total_users'=>$total_users,
            'total_subs'=>$total_subs,
            'today_users'=>$today_users,
            'today_blogs'=>$today_blogs,
            'today_subs'=>$today_subs,
        ]);
    }

    // Category
    function category(){
        $categories = Category::where('id' , '!=', 15)->get();

        return view('backend.category.category' , compact('categories'));
    }
    function category_store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        Category::create([
            'name'=>$request->name,
            'link'=>$request->link,
        ]);

        return back()->with('success' , 'Category Added Success!');
    }
    function category_delete($id){

        Blog::where('category_id' , $id)->update([
            'category_id'=>15,
        ]);

        Category::find($id)->delete();
        return back()->with('delete' , 'Category Delete Success');
    }
    function category_edit($id){
        $category = Category::find($id);
        return view('backend.category.category_edit' , compact('category'));
    }
    function category_update(Request $request, $id){
        $request->validate([
            'name'=>'required'
        ]);

        Category::find($id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
        ]);

        return redirect()->route('category')->with('update' , 'Category Updated Success');

    }

    // Tag
    function tag(){
        $tags = Tag::all();
        return view('backend.tag.tag' , compact('tags'));
    }
    function tag_store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);

        Tag::create([
            'name'=>$request->name,
        ]);

        return back()->with('success' , 'Tag Added Success!');
    }
    function tag_delete($id){

        Tag::find($id)->delete();
        return back()->with('delete' , 'Tag Delete Success');
    }
    function tag_edit($id){
        $tag = Tag::find($id);
        return view('backend.tag.tag_edit' , compact('tag'));
    }
    function tag_update(Request $request, $id){
        $request->validate([
            'name'=>'required'
        ]);

        Tag::find($id)->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('tag')->with('update' , 'Tag Updated Success');

    }

    // Notification
    function notification(){
        $notifications = Comment::where('blog_author_id' , Auth::user()->id)->get();
        return view('backend.notification.notification' , compact('notifications'));
    }

    function notification_view($id){
        $noti_info = Comment::find($id);

        Comment::find($id)->update([
            'status'=>1
        ]);
        return view('backend.notification.notification_view' , compact('noti_info'));
    }
    function reply_auth(Request $request){
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
            'author_status'=>1,
            'created_at'=>Carbon::now(),
        ]);

        return back();
    }
    function comment_status($id){
        $comment_status = Comment::find($id);

        if($comment_status->comment_status == 0){
            Comment::find($id)->update([
                'comment_status'=>1
            ]);
        }else{
            Comment::find($id)->update([
                'comment_status'=>0
            ]);
        }

        return back();
    }
}
