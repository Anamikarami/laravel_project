<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use App\Models\UsersSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserSettingController extends Controller
{
    public function index(){
        // $user=User::all()->pluck('name','id')->toArray();
        // dd($user);
        $userSetting = UsersSetting::where('id',Auth::id())->first();

        return view('profile',compact('userSetting'));
   }

   public function usersetting_save(Request $request){
   // dd($request);
     $userSetting = UsersSetting::where('user_id',Auth::id())->first();
    
     if(empty($userSetting)){
        $userSetting = new UsersSetting();
     }
      // dd($userSetting);
    //  $user = Auth::id();
    //  dd($user);
    //  $userprofile = Profile::create($request->only('fullName', 'about', 'company', 'job', 'country', 'address', 'phone', 'email') + ['user_id' => Auth::id()] );
    //  dd($userprofile);
     $userSetting->user_id = Auth::id() ;
     $userSetting->fullName = $request->fullName;
     $userSetting->about = $request->about;
     $userSetting->company = $request->company;
     $userSetting->job = $request->job;
     $userSetting->country = $request->country;
     $userSetting->address = $request->address;
     $userSetting->phone = $request->phone;
     $userSetting->email = $request->email;
     
     if($request->hasfile('profile_image'))
     {
      $directory = 'assets/avatar';

      $path =  $request->file('profile_image')->store($directory, 'public');
      $userSetting->profile_image = Storage::disk('public')->url($path);
     
      
     }
     
  dd($userSetting);
     $userSetting->save();
     $user = new User();
     $request->session()->put('default', $user->setUserSessiondata(Auth::id()));
    //  dd($request);
     return redirect()->route('index');

 }

 public function usersetting_update(Request $request){
  dd($request);


 }


}
