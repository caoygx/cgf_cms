<?php
use think\facade\Route;
use think\facade\Env;




Route::group('', function () {



    Route::rule('ita/notify', 'Home/notify');
})->middleware([\app\middleware\Auth::class],'home');

Route::group('u', function () {
    Route::rule('userAddress/index', 'userAddress/index');
    Route::rule('ProductBuy/index', 'ProductBuy/index');

    Route::rule('/user/index', 'User/index');
    Route::rule('/user/findPassword', 'User/findPassword');

    Route::rule('user/index', '\mapp\user\controller\User/index');

})->middleware([\app\middleware\Auth::class],'u');


Route::group('admin', function () {
    Route::rule('/userAddress/index', 'userAddress/index');
    Route::rule('/goods/index', 'goods/index');
    Route::rule('/auth/login/userInfo', 'login/userInfo');
    Route::rule('/auth/login/index', 'login/index');
    Route::rule('/auth/login/out', 'login/out');

    Route::rule('/auth/admin/index', 'authAdmin/index');
    Route::rule('/auth/admin/roleList', 'authRole/index');

    Route::rule('ProductBuy/index', 'ProductBuy/index');
    Route::rule('withdrawal/index', 'withdrawal/index');

    Route::rule('/auth_manager/index', 'AuthManager/index');

    //Route::rule('/user/index', 'User/index');


    Route::rule('user/index', '\mapp\admin\controller\User/index');




});//->middleware([\app\middleware\Auth::class],'admin');
