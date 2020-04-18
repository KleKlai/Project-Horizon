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

Route::resource('users', 'SysAdmin\UserController');
Route::get('log', 'SysAdmin\UtilitiesController@activityLog')->name('log.index')->middleware('password.confirm');

Route::resource('record', 'RecordController');
Route::post('record/media', 'RecordController@media')->name('record.media');

Route::get('cos/index', 'COS\Assigning@index')->name('cos.index');
Route::post('cos/assign/{record}', 'COS\Assigning@assign')->name('cos.assign');

Route::get('attorney/index', 'Lawyer\Resolution@index')->name('attorney.index');
Route::post('attorney/resolution/{id}', 'Lawyer\Resolution@submission')->name('attorney.resolution');
Route::post('attorney/resolution/upload/{id}', 'Lawyer\Resolution@resubmission')->name('attorney.resolution.reupload');
Route::get('attorney/download/{id}', 'Lawyer\Resolution@download')->name('attorney.resolution.download');

Route::get('adminhead/index', 'AdminHead\Validation@index')->name('adminhead.index');
Route::get('adminhead/approved/{id}', 'AdminHead\Validation@approved')->name('adminhead.approved');
Route::post('adminhead/disapproved/{id}', 'AdminHead\Validation@disapproved')->name('adminhead.disapproved');

Route::get('cos/assign', 'COS\Assigning@index')->name('cos.index');
Route::post('cos/setStatus/{id}', 'COS\Assigning@setStatus')->name('cos.set.status');

Route::get('/maynard', function() {

    Maynard::sayHello();

});

Route::get('/markAllRead', function(){
	Maynard::markAsRead();
    return redirect()->back();
})->name('markAllAsRead');

Route::get('/markAsRead/{id}', function($id){
    Maynard::markRead($id);
	return redirect()->back();
})->name('markRead');


