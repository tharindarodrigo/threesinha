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

Route::get('/authapi', function () {
    $token = new \App\Token();

    //return \App\Credential::all();
    //$token->authorizeUser();
    //return $token->accessToken;
    //return \App\Credential::all();
    //return \App\Credential::getCredentials();
//    return $token->credentials;
    $auth = session()->get('AUTH');
//    dd($token->accessToken,$auth);
//    dd();

});

Route::get('/command/{value}', function ($value) {
    //$token = new \App\Token();
    $device = new \App\Device();

    switch ($value) {
        case ('up'):
            return $device->executeAction('on');
            return 200;
            break;

        case ('down'):
            $device->executeAction('off');
            return 200;
            break;

        case ('stop'):
            $device->executeAction('blink');

            return 200;
            break;
        default:
            return 404;
    }
});

Route::view('/test', 'test');
Route::view('/reg', 'reg');
