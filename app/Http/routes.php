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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Auth'],function(){
    //登录、注册、退出路由
    get('auth/login','AuthController@getLogin');
    post('auth/login','AuthController@postLogin');

    get('auth/register','AuthController@getRegister');
    post('auth/register','AuthController@postRegister');

    get('auth/logout','AuthController@getLogout');

    // 发送密码重置链接路由
    get('password/email','PasswordController@getEmail');
    post('password/email','PasswordController@postEmail');

    // 密码重置路由
    get('password/reset/{token}','PasswordController@getReset');
    post('password/reset','PasswordController@postReset');


});

Route::group(['namespace' => 'Biji'],function(){
    resource('/biji','BijiController');

    //分享笔记--邮件路由
    Route::get('/mail/{id}','MailController@mail');

    //分享笔记--发送邮件路由
    Route::get('/send','MailController@send');

    //登录地址路由
    Route::get('/ip','IpController@ip');

    //移动端笔记路由
    Route::get('/mobile/biji','MobileController@biji');
});
//个人设置路由
Route::group(['namespace' => 'Set'],function(){

    //上传头像路由
    Route::any('/uploads','UploadController@upload');

    //安全设置路由
    resource('/setting','SetController');

    //用户指南路由
    Route::get('/guide','GuideController@guide');

    Route::get('/secure','SecureController@secure');

    //修改密码路由
    Route::post('/secure/password','SecureController@modify');

    //用户反馈路由
    Route::get('/fedBack','fedBackController@back');
    Route::get('/fedBack/count','fedBackController@count');

    //登录次数图表路由
    Route::get('/chart/','ChartController@chart');
    Route::get('/chart/data','ChartController@data');


});

Route::group(['namespace' => 'Book'],function(){
    //笔记本路由
   resource('/book','BookController');
});

Route::group(['namespace' => 'Sign'],function(){
    //用户签到路由
    Route::get('/sign','SignController@sign');

});

Route::group(['namespace' => 'Circle'],function(){
    //笔友圈路由
    resource('/circle','CircleController');

    //查找笔记路由
    Route::get('/search','SearchController@search');

    //评论路由
    resource('/comment','CommentController');

    //笔记收藏路由
    Route::get('/collect','CollectController@show');
    Route::get('/collect/{id}','CollectController@collect');
    Route::delete('/collect/{id}','CollectController@destroy');

    //点赞路由
    Route::get('/good','GoodController@good');

    //管理分享路由
    Route::get('/share','ShareController@share');
    Route::delete('/share/{id}','ShareController@destroy');

    //云标签路由
    Route::get('/tagsCloud/{id}','CloudController@tagsCloud');
});