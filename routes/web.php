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
    return view('welcome');
});

Auth::routes();

######## begin Pusher #######

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/app', 'HomeController@app')->name('app');
Route::post('comment', 'HomeController@saveComment')->name('comment.save');

######## end Pusher #######


######## begin Payments methode #######

Route::group(['prefix' => 'offers', 'middleware'=> 'auth'], function(){
    Route::get('/index', 'paymentController@index')->name('index');
    Route::get('/orders/{id}', 'paymentController@orders')->name('offers.details');
});

Route::get('/checkout_id', 'paymentController@checkout_id')->name('offers.checkout');
Route::get('/test_object', 'testController@test_object')->name('test_object');
Route::get('/object/{id}', 'testController@object')->name('test_object.details');
######## end Payments methode #######


######## start sent mail #######
/*Route::get('/data', 'mailTest@data')->name('data');*/
Route::get('/mail', 'mailTest@mail_sent')->name('mailsent');
######## end sent mail #######
