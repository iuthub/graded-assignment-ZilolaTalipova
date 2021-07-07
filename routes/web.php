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

Route::get('/', [
	'uses' => 'TasksController@getIndex',
	'as' => 'homeIndex'
]);
Route::group([
	'prefix'=>'Task',
	'middleware' => ['auth', 'verified']
], function(){

      Route::get('/', [
        'uses'=> 'TasksController@index',
        'as'=>'Task.index'
        ]);

      Route::post('/createTask',[
        'uses'=> 'TasksController@store',
        'as'=>'createTask'
        ]);
        Route::get('/deleteTask/{task_id}',[
          'uses'=> 'TasksController@destroy',
          'as'=>'deleteTask'
          ]);
          Route::get('/editTask/{task_id}',[
            'uses'=> 'TasksController@edit',
            'as'=>'editTask'
            ]);
            Route::post('/update', [
                     'uses' => 'TasksController@update',
                     'as' => 'updateTask'
                 ]);
});
Auth::routes(['verify'=>true]);


Route::get('/home', 'HomeController@index')->name('home');
