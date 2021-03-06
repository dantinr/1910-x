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

Route::get('/test1','TestController@test1');

Route::get('/','Index\IndexController@home')->middleware('check.mobile');       //首页

Route::get('/user/reg','User\IndexController@reg');            //注册
Route::post('/user/reg','User\IndexController@regDo');            //注册

Route::get('/user/login','User\IndexController@login');            //注册
Route::post('/user/login','User\IndexController@loginDo');            //注册
Route::get('/user/logout','User\IndexController@logOut');            //用户退出
Route::get('/user/login/github','User\IndexController@githubLogin'); //github登录跳转
Route::get('/oauth/github','User\OauthController@github');           //github授权回跳地址
Route::get('/user/center','User\IndexController@center');            //用户中心
Route::get('/user/bind/github','User\IndexController@bindGithub');   //绑定github账号
Route::get('/user/unbind/github','User\IndexController@unBindGithub');   //解绑绑github账号
Route::get('/wishlist','User\IndexController@wishList');   //收藏列表

Route::get('/goods','Goods\IndexController@index');            //商品详情

Route::get('/goods/view/rank','Goods\IndexController@viewRank');    //商品浏览排行榜

//商品
Route::prefix('/goods')->group(function(){
    Route::get('/fav','Goods\IndexController@fav');     //收藏商品
});


//购物车
Route::prefix('/cart')->group(function(){
    Route::get('/index','Cart\IndexController@index');          //购物车页面
    Route::get('/add','Cart\IndexController@add');              //添加
    Route::get('/del','Cart\IndexController@del');              //删除
});

Route::get('/chat','Chat\IndexController@index');           //聊天室

//订单
Route::prefix('/order')->group(function(){
    Route::get('/create','Order\IndexController@create');      //生成订单
});

Route::get('/top10','Goods\RankController@index');          //排行榜

//支付
Route::prefix('/pay')->group(function(){
    Route::get('/checkout','Pay\IndexController@checkout');           //支付页面
    Route::post('/create','Pay\IndexController@create');               //确定支付

    Route::get('/alireturn','Pay\IndexController@aliReturn');         //支付宝同步通知
    Route::post('/alinotify','Pay\IndexController@aliNotify');         //支付宝异步通知
});

//计划任务
Route::prefix('/cron')->group(function(){
    Route::get('/codec','Cron\VideoCron@codec');            //定时转码
});


Route::get('/prize','Prize\IndexController@index');         //抽奖




