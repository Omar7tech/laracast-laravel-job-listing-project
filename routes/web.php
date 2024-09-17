<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Mail\jobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('test' , function (){
   Mail::to('omar.7tech@gmail.com')->send(new jobPosted());
   return 'done';
});

Route::get('/', function () {
    return view("welcome");
});
Route::get('/about', function () {
    return view("about");
});

Route::get('/contact', function () {
    return view("contact");
});

Route::middleware('auth')->name('jobs.')->prefix('jobs')->controller(JobController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{job}', 'show')->name('show');
    Route::get('/edit/{job}', 'edit')->name('edit');
    Route::put('/{job}', 'update')->name('update');
    Route::delete('/{job}', 'destroy')->name('delete');
    Route::post('/', 'store')->name('store');
});

Route::controller(AuthController::class)->group(function () {
    Route::any("login", "login")->middleware('guest')->name("login");
    Route::any("register", "register")->middleware('guest')->name("register");
    Route::post("logout", "logout")->middleware('auth')->name("logout");
});
