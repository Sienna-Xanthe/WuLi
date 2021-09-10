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




Route::prefix('experiment6')->group(function (){
    /**
     * @Author: oys
     */

    Route::post('completion6','Completion6Controller@completion6');//实验6答题


});







Route::prefix('experiment')->group(function (){
    /**
     * @Author: Alexcutest
     */
    Route::post('student','ExperimentController@student');//学生信息


    Route::post('completion','ExperimentController@completion');//实验答题

    Route::post('completion8','runController@completion8');//实验8答题



});

Route::prefix('bridge') -> group(function(){
    Route::post('student','BridgeController@student');//学生信息
    Route::post('completion','BridgeController@completion');//实验答题

});

Route::prefix('experiment11')->group(function (){
    /**
     * @Author: pxy
     */

    Route::post('completion11','Completion11Controller@completion11');//实验11答题


});
Route::prefix('experiment4')->group(function (){
    /**
     * @Author: yjx
     */
    Route::post('completion4','Completion4Controller@completion4');//实验4答题
});//yjx
Route::prefix('experiment14')->group(function (){
    /**
     * @Author: yjx
     */
    Route::post('completion14','Completion14Controller@completion14');//实验14答题
});//yjx


Route::prefix('pendulum')->group(function (){
    /**
     * @Author: wzh
     */

    Route::post('completion3','PendulumController@completion3');//实验答题


});


Route::prefix('experiment1')->group(function (){
    /**
     * @Author: pxy,zqz
     */

    Route::post('completion1','Completion1Controller@completion1');//实验1答题


});


/**
 * @Author: pxy
 */
Route::prefix('admin')->group(function (){

    Route::get('home','AdminController@home');//审批中心主页
    Route::post('approval','AdminController@approval');//审批
    Route::get('urlreturn','AdminController@urlreturn');//图片链接返回
    Route::get('gradesshow','AdminController@gradesshow');//pdf导出页面
    Route::get('detail','AdminController@detail');//pdf导出详情页面
    Route::get('numsearch','AdminController@numsearch');//学号查询审批页面
    Route::get('singleexport','AdminController@singleexport');//单个导出

});

