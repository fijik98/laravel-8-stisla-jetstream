<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
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
/*
|
|
|
|--------------------------------------------------------------------------
| Para forzar https ->              o        App/Providers/AppServiceProvider -> boot()
|--------------------------------------------------------------------------
|   use Illuminate\Support\Facades\URL;
|   URL::forceScheme('https');
|
|
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');
});

Route::get('send-mail', function () {

    $details = [
        'title' => 'Torneitos CIFP ZONZAMAS',
        'body' => 'Bienvenido a nuestro sistema'
    ];

    \Mail::to('fijisuarez@gmail.com')->send(new \App\Mail\MyTestMail($details));
    dd("Email is Sent.");

});
