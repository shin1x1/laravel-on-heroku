<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// user pages
Route::group(['before' => 'auth'], function() {
    Route::get('/', 'ImageController@getIndex');

    Route::get('/upload', 'ImageController@getUpload');
    Route::post('/upload', 'ImageController@postUpload');
});

// login
Route::get('/login', function() {
    Auth::logout();
    return View::make('login');
});
Route::post('/login', function() {
    $rules = [
        'name' => 'required',
        'password' => 'required',
    ];
    $columns = array_keys($rules);

    $validator = Validator::make(Input::only($columns), $rules);
    if ($validator->passes()) {
        if (Auth::attempt(Input::only('name', 'password'))) {
            return Redirect::to('/');
        }
    }

    return Redirect::back()->withErrors($validator->errors())->withInput();
});

/**
 * This allows us to route to the correct assets
 */
Route::group(Config::get('asset-pipeline::routing'), function() {
    Route::get('{path}', Config::get('asset-pipeline::controller_action'))->where('path', '.*');
    ob_start('ob_gzhandler'); // add ob_gzhandler
});
