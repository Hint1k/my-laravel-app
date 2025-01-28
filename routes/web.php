<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Main page';
    //    return view('welcome');
})->name('main page');

Route::get('/hello/{name}', function ($name) {
    return 'Hello ' . $name . '!';
})->name('hello + name');

Route::get('/hello', function () {
    return 'Hello!';
})->name('hello');

Route::get('/hallo', function () { // misspelled hello
//    return redirect('/hello'); // without route names
    return redirect()->route('hello'); //with route names
})->name('misspelled hello');

Route::fallback(function () {
   return "This is a fallback page";
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__ . '/auth.php';
