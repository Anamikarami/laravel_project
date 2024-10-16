<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Make sure to import the Menu model
use App\Models\User; // Make sure to import the Menu model
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class MenuController extends Controller
{
    //
    public function index()
    {
    
        // Fetch all menu items from the database
         $menus = Menu::select('name')->get();

        //  dd('hii');
        // Fetch all menu items from the database
         $menus = Menu::select('menu_name')->get();
// dd($menu);
        // Pass the data to the view
         return view('index', compact('menus'));
    }

    public function profile(){
        $menus = Menu::select('name')->get();
        $firstUser =User::select('name')->first();
        return view('profile', compact('menus','firstUser'));
    }

    
}
