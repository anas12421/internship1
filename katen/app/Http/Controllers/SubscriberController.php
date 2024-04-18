<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function subscriber(Request $request){
        $request->validate([
            'email'=>'required',
        ]);
       if(Subscriber::where('email' ,$request->email)->exists()){
        // return back()->with('subscribe' , 'Email Already Exists!');
        return redirect(url()->previous().'#subscriber')->with('subscribe' , 'Email Already Exists!');
       }
       else{
        Subscriber::create([
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
        ]);
        // return back()->with('subscribe' , 'Successfully Subscribed');
        return redirect(url()->previous().'#subscriber')->with('subscribe' , 'Successfully Subscribed');
       }
    }

    function subscriber_list(){
        $subscribers = Subscriber::all();

        return view('backend.subscriber.subscriber' ,  compact('subscribers'));
    }
}
