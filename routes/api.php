<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('experiment')->group(function (){
    /**
     * @Author: Alexcutest
     */
    Route::post('student','ExperimentController@student');//学生信息


    Route::post('completion','ExperimentController@completion');//实验答题

    Route::post('completion8','runController@completion8');//实验8答题

    Route::get('pdf','ExperimentController@pdf');//实验pdf



});

Route::prefix('experiment11')->group(function (){
    /**
     * @Author: pxy
     */

    Route::post('completion11','Completion11Controller@completion11');//实验11答题

    Route::get('pdf11','Completion11Controller@pdf11');//实验11pdf

});
