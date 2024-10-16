<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Make sure to import the Menu model

class MenuController extends Controller
{
    //
    public function index()
    {
    //    dd('hii');
        // Fetch all menu items from the database
         $menus = Menu::select('name')->get();
// dd($menu);
        // Pass the data to the view
         return view('index', compact('menus'));
    }
}
