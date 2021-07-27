<?php

use App\Http\Controllers\Main\Customer\Course;
use App\Http\Controllers\Main\System\Message;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    Session::put('id_users',1);
    Session::put('menu','home');
    return view('webview.index');
});

Route::post('search-by', [App\Http\Controllers\Frontend\HomeController::class,'search_tutor']);

Route::get('about', function () {
    Session::put('menu','about');
    return view('webview.about');
});

Route::get('course', [Course::class,'index']);
Route::get('course/{params}/details', [Course::class,'show']);
Route::post('send-message',[Message::class,'message']);
Route::get('message-data',[Message::class,'data_message']);

Route::get('trainers', function () {
    Session::put('menu','trainers');
    return view('webview.trainers');
    return view('webview.trainers');
});

Route::get('events', function () {
    Session::put('menu','events');
    return view('webview.events');
});

Route::get('pricing', function () {
    Session::put('menu','pricing');
    return view('webview.pricing');
});

Route::get('contact', function () {
    Session::put('menu','contact');
    return view('webview.contact');
});

Route::get('log-in', function(){
    return view('webview.login.login');
});

Route::get('signup', function(){
    return view('webview.login.signup');
});

Route::get('become-tutor',function(){
    return view('webview.login.teach.registered');
});

Route::get('relog',[App\Http\Controllers\Main\System\Reglog::class, 'test_mail']);

Route::get('cek-mail', function(){
    return view('emails.Registered_mail');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
