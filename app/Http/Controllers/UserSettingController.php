<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
use App\Models\UsersSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
     
      $imageName = '';
      $deleteOldImg =  public_path('images/profile/'.$request->image);
        if ($image = $request->file('profile_image')){
            if(file_exists($deleteOldImg)){
                File::delete($deleteOldImg);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/profile', $imageName);
        }else{
            $imageName = $request->image;
        }

        $userSetting->profile_image = $imageName;

     $userSetting->save();
     $user = new User();
     $request->session()->put('default', $user->setUserSessiondata(Auth::id()));
     //  dd($request);
     //   return redirect()->route('index');
     return redirect()->back()->with('success', 'Profile image updated successfully!');

 }


   public function updatePassword(Request $request){
               $validated = $request->validate([
                  'current_password' => 'required',
                  'password' => 'required|string|min:8|confirmed',
            ]);

            $user = $request->user();

            // Check current password
            if (!Hash::check($validated['current_password'], $user->password)) {
                  throw ValidationException::withMessages([
                     'current_password' => ['The provided password does not match your current password.'],
                  ]);
            }

            // Update password
            $user->update([
                  'password' => Hash::make($validated['password']),
            ]);

            return redirect()->back()->with('status', 'Password updated successfully!');


    }
         

}
