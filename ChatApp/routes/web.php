<?php

use App\Events\SendMessage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LoginMiddleware;
use App\Livewire\Home;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function()
{
    Route::get('/','index')->name('Home')->Middleware(LoginMiddleware::class);
});

Route::get('/Chat',function(){
    broadcast(new SendMessage(User::find(auth()->user()->id)));
});
Route::controller(LoginController::class)->group(function()
{
    Route::get('/Login','show')->name('Login');
    Route::post('/authenticate', 'authenticate')->name('Auth');
    Route::post('/logout','logout')->name('Logout');
});

Route::get('/Setting',Home::class)->name('Setting');

Route::get('/Test',function()
{
        return view('test');
});
