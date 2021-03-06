<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware'=>['auth','verified']],function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('settings/profile','DashboardController@profile')->name('profile');
    Route::post('settings/profile','DashboardController@profile_save')->name('profile.save');
    Route::get('settings/security','DashboardController@security')->name('security');
    Route::post('settings/security','DashboardController@security_save')->name('security.save');
    Route::get('settings/billing','DashboardController@billing')->name('billing');
    Route::post('settings/billing','DashboardController@billing_save')->name('billing.save');
});
