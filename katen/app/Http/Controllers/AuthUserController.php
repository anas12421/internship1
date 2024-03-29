<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class AuthUserController extends Controller
{
    function auth_user(){
        return view('backend.auth_user.auth_user');
    }
    function auth_user_info_update(Request $request){

        User::find(Auth::id())->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'updated_at'=>Carbon::now(),
        ]);

        return back()->with('updated' , "User Info Updated");
    }
    function auth_user_password_update(Request $request){

        $request->validate([
            'current_password'=>'required',
            'password'=>[
                'required','confirmed',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        $user = User::find(Auth::id());
        if(Hash::check($request->current_password, $user->password)){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),

               ]);
               return back()->with('pass_update','Password Updated');
        }
        else{
            return back()->with('wrong','Current Password Wrong');
        }


    }
    function auth_user_photo_update(Request $request){

        $request->validate([
            'profile_photo'=>'required|image|mimes:jpg,png|file|max:1024',
        ]);

        if(Auth::user()->photo == null){

            $photo = $request->file('profile_photo');

            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;
            Image::read($photo)->save(public_path('uploads/users/'.$file_name));

             User::find(Auth::id())->update([
                'photo'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);

              return back()->with('photo_updated' , 'Photo Updated !');
        }

        else{
            $current_img = public_path('uploads/users/'.Auth::user()->photo);
            unlink($current_img);
            $photo = $request->file('profile_photo');
            $extension = $photo->extension();
            $file_name = Auth::id().'.'.$extension;
            Image::read($photo)->save(public_path('uploads/users/'.$file_name));

             User::find(Auth::id())->update([
                'photo'=>$file_name,
                'updated_at'=>Carbon::now(),
            ]);

            return back()->with('photo_updated' , 'Photo Updated !');
        }



    }
}
