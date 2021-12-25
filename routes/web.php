<?php
// root
Route::get('/', function () {
    return view('welcome');
});

// auth user
Auth::routes();

// top page that always show after login or register
Route::get('/{any}', function(){
    return view('top');
})->name('top')->where('any', '^(?!.*(login|register)).*$')->middleware('auth');
