<?php
declare (strict_types=1);

namespace app\middleware;


use app\model\OutletUser as User;
use think\facade\Request;
use think\Response;
use think\facade\Db;
use think\Facade\Route;
use think\Facade\Config;

class Auth
{
    public $controllerName;
    public $actionName;

    /**
     * @param $request
     * @param \Closure $next
     * @param $c
     * @return mixed
     */
    public function handle($request, \Closure $next,$module)
    {
        //获取模块名
        if(empty($module)){ //没传模块名，自动通过url获取
            $pathinfo = Request::pathinfo();
            $pathinfo = explode('/',$pathinfo);
            $module = $pathinfo[0];

        }
        $request->module = $module;

        $controller = Request::controller();
        $action = Request::action();
        if(strtolower($module) == 'u'){ //做验证
            //$rUser = $this->checkUser();
            $u = getUserAuth();
            if(empty($u)) return json(['code' => 0, 'msg'  => '未登录' ]);
            $rUser = Db::name('User')->find($u['uid']);
            if(empty($rUser)) return json(['code' => 0, 'msg'  => '用户不存在' ]);
            $request->uid = $rUser['id'];
            $request->store_id = 1;//$rUser['current_outlet_id'];
            $request->user = $rUser;

            //Config::set(['default_return_format' => 'html'], 'app');
            //$request->defaultReturnFormat='html';

        }elseif(strtolower($module) == 'admin'){
            /*$u = getUserAuth();
            if(empty($u)) return json(['code' => 0, 'msg'  => '未登录' ]);
            $rUser = Db::name('OutletUser')->find($u['token']);
            if(empty($rUser)) return json(['code' => 0, 'msg'  => '用户不存在' ]);*/
            $request->admin_id = input('token');
            //$request->store_id = $rUser['current_outlet_id'];
            //$request->user = $rUser;
            Config::set(['default_return_format' => 'html'], 'app');
            $request->defaultReturnFormat='html';
        }else{
            //放行
            $request->status=1; //前台用户只显示非禁用的数据
        }
        return $next($request);
    }

    function checkUser(){
        //return $rUser;
    }

    /*
     if ($this->needToBeValidate()) {
            $u =$this->getAuth();
            if(empty($u)) {
                return abort(0, '没有登录');
            }

            //$request->u = $u;
        }
     */

    //检查当前操作是否需要认证 requires authentication
    public function needToBeValidate()
    {
        //如果项目要求认证，并且当前模块需要认证，则进行权限认证
        $_module = array();
        $_action = array();
        if ("" != C('app.require_auth_module')) {
            //需要认证的模块
            $_module['yes'] = explode(',', strtoupper(C('app.require_auth_module')));
        } else {
            //无需认证的模块
            $_module['no'] = explode(',', strtoupper(C('app.not_auth_module')));
        }
        //检查当前模块是否需要认证
        if (
            (!empty($_module['no']) && !in_array(strtoupper($this->controllerName), $_module['no']))
            || (!empty($_module['yes']) && in_array(strtoupper($this->controllerName), $_module['yes']))
        ) {
            if ("" != C('app.app.require_auth_action')) {
                //需要认证的操作
                $_action['yes'] = explode(',', strtoupper(C('app.app.require_auth_action')));
            } else {
                //无需认证的操作
                $_action['no'] = explode(',', strtoupper(C('app.not_auth_action')));
            }
            //检查当前操作是否需要认证
            if ((!empty($_action['no']) && !in_array(strtoupper($this->actionName), $_action['no'])) || (!empty($_action['yes']) && in_array(strtoupper($this->actionName), $_action['yes']))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }

    function addressableUrl()
    {
        //白名单优先
        if (!empty(C('whitelist'))) {
            //只允许白名单中的controller
            $wl_control  = C('whitelist.controller');
            $wl_action   = C('whitelist.action');
            $wl_url      = C('whitelist.url');
            $wl_url      = array_map(
                function ($value) {
                    return strtolower($value);
                },
                $wl_url
            );
            $current_url = $this->controllerName . '/' . $this->actionName;
            //var_dump(lcfirst($current_url));
            //var_dump($wl_url);exit;
            if (in_array(lcfirst($this->controllerName), $wl_control)
                || in_array(lcfirst($this->actionName), $wl_action)
                || in_array(strtolower($current_url), $wl_url)

            ) {
                //通过白名单
            } else {
                $this->error('control 1 非法访问');
            }
        }

        //黑名单
        if (!empty(C('blacklist'))) {
            //禁用访问黑名单中的controller
            $bl_control  = C('blacklist.controller');
            $bl_action   = C('blacklist.action');
            $bl_url      = C('blacklist.url');
            $current_url = $this->controllerName . '/' . $this->actionName;
            if (in_array(lcfirst($this->controllerName), $bl_control)
                || in_array(lcfirst($this->actionName), $bl_action)
                || in_array(strtolower($current_url), $bl_url)
            ) {
                $this->error('control 2 非法访问');
            }

        }


        $referer = empty($_SERVER['HTTP_REFERER']) ? '/' : $_SERVER['HTTP_REFERER'];
        C('referer', $referer);
    }

}
