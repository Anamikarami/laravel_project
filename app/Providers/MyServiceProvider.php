<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Menu;
use App\Models\UsersSetting;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       
            // $menu = 
            // dd($user_data);
            // View::share('menu', $menu); 



            View::composer('*', function ($view) {


            $menus = Menu::get();
            $firstUser = User::where('id',Auth::id())->first();
            $userSetting = UsersSetting::where('user_id',Auth::id())->first();
            // dd($firstUser);
            View::share('menus', $menus);
            View::share('firstUser', $firstUser);
            View::share('userSetting', $userSetting);
            });
            
       
    }
}
