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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/authapi', function(){
    $token = new \App\Token();
    return $token->authorizeAPI();

});

Route::get('/command/{value}', function($value){
    switch ($value){
        case ('up'):
            return 200;
            break;
        case ('down'):
            return 200;
            break;
        case ('stop'):
            return 200;
            break;
        default:
            return 404;
    }
});

Route::view('/test', 'test');
Route::view('/reg', 'reg');
