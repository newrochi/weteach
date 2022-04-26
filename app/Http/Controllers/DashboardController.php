<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function profile(){
        return view('settings.profile');
    }
    public function profile_save(Request $request){
        $user=Auth::user();
        $request->validate([
            'name'=>'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')->ignore($user->id),
            ],
        ]);

        $user->name=$request->name;
        $user->email=$request->email;
        if($request->hasFile('photo')){
            $request->validate([
                'photo'=>'image|mimes:png,jpg.jpeg'
            ]);
            $photo=$request->photo;
            $filename=Str::slug($request->name).'-'.uniqid().'.'.$photo->extension();
            $photo->storeAs('public/images/user',$filename);
            $user->photo=$filename;
        }
        $user->save();
        return back()->with(['alert'=>'Succussfully updated profile info','alert_type'=>'success']);
    }

    public function security(){
        return view('settings.security');
    }
    public function security_save(Request $request){
        $user=Auth::user();
        $request->validate([
            'password'=>'required|confirmed'
        ]);

        $user->password=Hash::make($request->password);
        $user->save();
        return back()->with(['alert'=>'Succussfully updated your password','alert_type'=>'success']);
    }

    public function billing(){
        return view('settings.billing');
    }
    public function billing_save(Request $request){
        return 'You have successfully updated your billing info';
    }
}
