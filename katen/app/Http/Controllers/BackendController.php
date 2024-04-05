<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function dashboard() {
        return view('dashboard');
    }

    // Category
    function category(){
        $categories = Category::all();
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
}
