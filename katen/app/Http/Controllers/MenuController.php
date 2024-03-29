<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu(){
        $menus = Menu::all();
        return view('backend.menu.menu' , compact('menus'));
    }
    function menu_store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        Menu::create([
            'name'=>$request->name,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success', 'Menu Added Success!');
    }
    function menu_delete($id){
        Menu::find($id)->delete();
        return back()->with('delete', 'Menu Deleted Success!');
    }
}
