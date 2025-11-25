<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function() {
    $lang = request('lang', 'id');
    App::setLocale($lang);
})->name('product');

Route::get('/product/{locale}', function($locale) {
    $locale = request('locale');
    App::setLocale($locale);

    return view('product');
})->name('locale-product');


Route::get('courses', function () {
    $lang = request('lang', config('app.locale')); // gunakan default Laravel jika tidak ada
    return redirect()->route('courses', ['lang' => $lang]);
});

Route::get('{lang}/courses', [CoursesController::class, 'index'])
    ->name('courses');