<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', ['uses' => 'App\Http\Controllers\FrogController@index', 'as' => 'index']);

$app->get('frog', ['uses' => 'App\Http\Controllers\FrogController@index', 'as' => 'frog.index']);

$app->get('frog/create', ['uses' => 'App\Http\Controllers\FrogController@create', 'as' => 'frog.create']);

$app->post('frog/create', ['uses' => 'App\Http\Controllers\FrogController@store', 'as' => 'frog.store']);

$app->get('frog/{id}', ['uses' => 'App\Http\Controllers\FrogController@edit', 'as' => 'frog.edit']);

$app->put('frog/{id}', ['uses' => 'App\Http\Controllers\FrogController@update', 'as' => 'frog.update']);

$app->get('frog/{id}/kill', ['uses' => 'App\Http\Controllers\FrogController@kill', 'as' => 'frog.kill']);

$app->get('frog/{id}/mate', ['uses' => 'App\Http\Controllers\FrogController@mateWith', 'as' => 'frog.mate']);

$app->post('frog/{id}/mate', ['uses' => 'App\Http\Controllers\FrogController@mateWith', 'as' => 'frog.mate.go']);

