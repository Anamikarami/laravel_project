<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Menu; // Make sure to import the Menu model
use App\Models\User; // Make sure to import the Menu model
use App\Models\UsersSetting; 
use Illuminate\Support\Facades\Auth;
 // Make sure to import the Menu model
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class MenuController extends Controller
{
    //
    public function index()
    {
    
        // Fetch all menu items from the database
         // $menus = Menu::select('name')->get();

        
        // Pass the data to the view
         return view('index');
    }

    public function profile(){
//         $menus = Menu::select('name')->get();
//         $firstUser =User::select('name')->first();
//         $userSetting = UsersSetting::where('user_id',Auth::id())->first();
// //dd($userSetting);
        return view('profile');
    }

    
}
