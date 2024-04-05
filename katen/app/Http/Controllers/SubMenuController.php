<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    function submenu(){
        $menus = Menu::all();
        $submenus = SubMenu::all();
        return view('backend.sub_menu.submenu', compact('menus', 'submenus'));
    }
    function submenu_store(Request $request){
        $request->validate([
            'menu_id'=>'required',
            'name'=>'required',
        ]);

        submenu::create([
            'menu_id'=>$request->menu_id,
            'name'=>$request->name,
            'link'=>$request->link,
            'created_at'=>Carbon::now(),
        ]);

        return back()->with('success', 'Sub Menu Added Success!');
    }
    function submenu_delete($id){

        SubMenu::find($id)->delete();

        return back()->with('delete', 'Sub Menu Deleted Success!');
    }
    function submenu_edit($id){
        $submenu = SubMenu::find($id);
        return view('backend.sub_menu.submenu_edit', compact('submenu'));
    }
    function submenu_update(Request $request, $id){
        $request->validate([
            'name'=>'required'
        ]);

        SubMenu::find($id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
        ]);
        return redirect()->route('submenu')->with('update', 'SubMenu Updated Success!');


    }
}
