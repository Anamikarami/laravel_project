<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController; 


    // Route::get('/', function () {
    //     return view('index');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {

        //for dashboard
        Route::get('/', function () {  return view('index');})->name('dashboard');   

        // for login and register    
        Route::post('/index', function () {return view('index'); });  
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/profile/logout',[ProfileController::class, 'logout']);

        // for profile page
        Route::get('/profile/user', [MenuController::class, 'profile'])->name('profile');
        Route::post('/profile/save',[UserSettingController::class,'usersetting_save'])->name('user.save');
        Route::put('/password/update', [UserSettingController::class, 'updatePassword'])->name('password.update');
        

        // for sidebar
        // for siderbar and header using service provider 
        // Route::get('/', [MenuController::class, 'index'])->name('index');
            
    });

require __DIR__.'/auth.php';
