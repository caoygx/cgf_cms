<?php
use think\facade\Route;
use think\facade\Env;




Route::group('', function () {
    Route::rule('/', 'home/index');
})->middleware([\app\middleware\Auth::class],'home');

Route::group('u', function () {
    Route::rule('userAddress/index', 'userAddress/index');
    Route::rule('ProductBuy/index', 'ProductBuy/index');

    Route::rule('/user/index', 'User/index');
    Route::rule('/user/findPassword', 'User/findPassword');

    Route::rule('user/index', '\mapp\user\controller\User/index');

})->middleware([\app\middleware\Auth::class],'u');


Route::group('admin', function () {

    Route::rule('/goods/index', 'goods/index');
    Route::rule('/goods/add', 'goods/add');
    Route::rule('/goods/edit', 'goods/edit');
    Route::rule('/goods/save', 'goods/save');

    Route::rule('/app/index', 'app/index');
    Route::rule('/game/index', 'game/index');
    Route::rule('/job/index', 'job/index');
    Route::rule('/gmv/index', 'gmv/index');
    Route::rule('/mobile/index', 'mobile/index');
    Route::rule('/edu/index', 'edu/index');
    Route::rule('/watch/index', 'watch/index');
    Route::rule('/tv/index', 'tv/index');

    Route::rule('/order/index', 'order/index');
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




})->middleware([\app\middleware\Auth::class],'admin');
