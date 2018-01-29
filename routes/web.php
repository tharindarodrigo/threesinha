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
    $token->authorize();
//    dd($token);
    //return \App\Credential::all();
    //return \App\Credential::getCredentials();
//    return $token->credentials;
    $auth = session()->get('AUTH');
    dd($token->accessToken,$auth);
//    dd();

});

Route::get('/command/{value}', function ($value) {
    //$token = new \App\Token();

    \App\Logg::insert(['log'=>$value]);
    $device = new \App\Device();

    switch ($value) {
        case ('up'):
            return $device->executeAction('on');

            break;
        case ('down'):

            return $device->executeAction('off');
            break;
        case ('stop'):
            return $device->executeAction('blink');

            break;
        default:
            return 404;
    }
});

Route::get('tv/{action}', 'IRBlasterController@sendCommand');

Route::get('devices', function (){
    $devices = new \App\Device();
    return $devices->getAllDevices();
});

Route::view('remote', 'remote');

Route::view('/test', 'test');
Route::view('/reg', 'reg');
Route::get('/logg',function() {
    return \App\Logg::all();
});
