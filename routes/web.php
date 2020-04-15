<?php

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
    if(Auth::check()){
        return redirect('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'HomeController@profile')->name('myprofile.index')->middleware(['auth','password.confirm']);
Route::put('profile/update/{user}', 'HomeController@updateProfile')->name('profile.update');
Route::post('password/authenticate', 'HomeController@newPassword')->name('password.update');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('record', 'RecordController');

Route::resource('users', 'SysAdmin\UserController');
Route::get('log', 'SysAdmin\UtilitiesController@activityLog')->name('log.index')->middleware('password.confirm');

Route::get('cos', function(){
    return view('component.cos.index');
})->name('cos.index');

Route::get('lawyer', function(){
    return view('component.lawyer.index');
})->name('lawyer.index');

Route::get('adminhead', function(){
    return view('component.adminhead.index');
})->name('adminhead.index');

Route::get('/maynard', function() {

    Maynard::sayHello();

});


