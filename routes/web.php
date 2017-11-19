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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('User/{method}', function ($method) {
  //var_dump($method);die;
  if ($method == 'index') {
    return view('User/user');
  }
  elseif ($method == 'show') {
    //return view('User/user');
    return Route::get('User', 'UserController@show');

  }
  else {
    //return view('User/user');
  }
  //return view('User/user');
});*/

//Route::get('User', 'UserController@show');

Route::resource('User', 'UserController');
#Route::get('User', 'UserController@index');
Route::post('User', ['as'=>'User.store','uses'=>'UserController@store']);



Route::get('/', function () {
  return view('Yogesh.index');
});
#Route::resource('Yogesh', 'YogeshController');
/*Route::get('/yogesh/{id?}', 'Yogesh@index');
Route::post('/yogesh', 'Yogesh@store');
Route::post('/yogesh/{id}', 'Yogesh@update');
Route::delete('/yogesh/{id}', 'Yogesh@destroy');*/

/*Route::get('/api/v1/yogesh/{id?}', 'YogeshController@index');
Route::post('/api/v1/yogesh', 'YogeshController@store');
Route::post('/api/v1/yogesh/{id}', 'YogeshController@update');
Route::delete('/api/v1/yogesh/{id}', 'YogeshController@destroy');*/

Route::get('/api/v1/yogesh/{id?}', 'YogeshController@index');
Route::post('/api/v1/yogesh/', 'YogeshController@store');
Route::post('/api/v1/yogesh/{id}', 'YogeshController@update');
Route::delete('/api/v1/yogesh/{id}', 'YogeshController@destroy');


