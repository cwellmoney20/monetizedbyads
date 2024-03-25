<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleOauthController;
use App\Http\Controllers\OpenGraphController;


Route::get('/', function(){
    return view('home',
    [
        'title' => "Monetized by Ads",
        'description' => "Find sites that are being monetized by display ads, and which networks they are using.",
    ]);
})->name('home');

Route::get('privacy', function(){
    return view('privacy');
})->name('privacy');

Route::get('terms', function(){
    return view('terms');
})->name('terms');
