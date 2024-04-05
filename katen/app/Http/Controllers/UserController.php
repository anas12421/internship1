<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    function user(){
        $users = User::where('id' , '!=', Auth::id())->get();
        return view('backend.user.user',[
            'users'=>$users,
        ]);
    }
    function user_store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>[
                'required','confirmed',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'password_confirmation'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        return back()->with('success', 'User Added Success!');
    }
    function user_delete($id){
        $user =  User::find($id);

        if($user->photo == null){
            User::find($id)->delete();
            return back()->with('delete', 'User Deleted Success!');
        }
        else{

            $img = User::find($id);
            $current_img = public_path('uploads/users/'.$img->photo);
            unlink($current_img);

            User::find($id)->delete();
            return back()->with('delete', 'User Deleted Success!');
        }
    }
    function user_edit($id){
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }
    function user_update(Request $request, $id){

        if($request->password == '' && $request->password_confirmation == ''){

            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'role'=>'required',

            ]);

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'role'=>$request->role,
            ]);

            return back()->with('update', 'User Update Success!');
        }else{
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>[
                    'required','confirmed',Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                ],
                'password_confirmation'=>'required',

            ]);

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'role'=>$request->role
            ]);

            return back()->with('update', 'User Update Success!');
        }

    }
}
