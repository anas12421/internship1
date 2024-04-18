<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    function new_blog(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.blog.blog_store' , compact('categories', 'tags'));
    }
    function blog_store(Request $request){
        $request->validate([
            'author'=>'required',
            'title'=>'required',
            'category_id'=>'required',
            'tags'=>'required',
            'description'=>'required',
            'auth_desp'=>'required',
            'photo'=>'required|image',
        ]);

        $remove = array("@", "#" , "(", ")", '"' ,":","*", "'", "/" , " ") ;
        $slug =Str::lower(str_replace($remove, '-',$request->title)).'-'.random_int(100, 30000) ;

        $photo = $request->file('photo');
        $extension = $photo->extension();
        $file_name = str_replace($remove, '-',$request->title).'.'.$extension;
        Image::read($photo)->save(public_path('uploads/blogs/'.$file_name));

        Blog::create([
            'author_id'=>Auth::id(),
            'author'=>$request->author,
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'tags' => implode(',' ,$request->tags),
            'description'=>$request->description,
            'auth_desp'=>$request->auth_desp,
            'photo'=>$file_name,
            'slug'=>$slug,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success' , 'Blog Added Success!');
    }
    function blog_list(){
        $blogs = Blog::all();
        $auth_blogs = Blog::where('author_id' , Auth::id())->get();
        return view('backend.blog.blog' , [
            'blogs'=>$blogs,
            'auth_blogs'=>$auth_blogs
        ]);
    }
    function blog_delete($id){

        $blog = Blog::find($id);

        $current_img = public_path('uploads/blogs/'.$blog->photo);
        unlink($current_img);

        Blog::find($id)->delete();

        return back()->with('delete' , 'Blog Deleted Success!');
    }
    function blog_view($id){
        // $blog_id = Blog::where('slug',$slug)->first()->id->get();
        $blog = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('backend.blog.blog_view' , [
            'blog'=>$blog,
            'categories'=>$categories,
            'tags'=>$tags,
        ]);
    }
    function blog_update(Request $request, $id){
        $request->validate([
            'author'=>'required',
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'auth_desp'=>'required',
        ]);

        $remove = array("@", "#" , "(", ")", '"' ,":","*", "'", "/" , " ") ;
        $slug =Str::lower(str_replace($remove, '-',$request->title)).'-'.random_int(100, 30000) ;

        if($request->photo == null){
            Blog::find($id)->update([
                'author'=>$request->author,
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'description'=>$request->description,
                'auth_desp'=>$request->auth_desp,

                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('update' , 'Blog Updated Success!');
        }else{
            $blog_img = Blog::find($id);
            $current_img = public_path('uploads/blogs/'.$blog_img->photo);
            unlink($current_img);

            $photo = $request->file('photo');
            $extension = $photo->extension();
            $file_name = str_replace($remove, '-',$request->title).'.'.$extension;
            Image::read($photo)->save(public_path('uploads/blogs/'.$file_name));

            Blog::find($id)->update([

                'author'=>$request->author,
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'description'=>$request->description,
                'auth_desp'=>$request->auth_desp,
                'photo'=>$file_name,

                'updated_at'=>Carbon::now(),
            ]);
            return back()->with('update' , 'Blog Updated Success!');
        }
    }
    function blog_banner_status($id){
        $st = Blog::where('banner_status', 1)->get()->count();

        if(Blog::find($id)->banner_status == 0){
            if($st >= 1){
                return back()->with('status' , 'Only 1 item will be active at a time and Unactive the Active item and Try Agen!');
            }else{
                Blog::find($id)->update([
                    'banner_status'=>1,
                    ]);
                    return back();
            }
        }
        else{
                Blog::find($id)->update([
                'banner_status'=>0,
                ]);
                return back();

        }
    }

    // Frontend
    function blog_single($slug){
        $blog_id = Blog::where('slug',$slug)->first()->id;
        $blog_info = Blog::find($blog_id);
        $recent_blogs =Blog::all()->take(4)->sortByDesc("views");
        $categories = Category::all();
        $tags = Tag::all();
        $comments = Comment::where('blog_id' ,$blog_id )->latest()->get();




        Blog::where('id' , $blog_id)->increment('views' , 1);
        return view('frontend.blog.blog_single' ,[
            'blog_info'=>$blog_info,
            'recent_blogs'=>$recent_blogs,
            'categories'=>$categories,
            'tags'=>$tags,
            'comments'=>$comments,
        ]);
    }
}
