<?php
declare (strict_types=1);

namespace app\middleware;


use app\model\OutletUser as User;
use app\Request;

class CheckLogin
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed|\think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function handle($request, \Closure $next)
    {
        $user_id = $request->param('uid');
        if (empty($user_id)) {
            return json([
                'code' => 0,
                'msg' => '缺少用户参数'
            ]);
        }

        $user_info = User::find($user_id);
        if (empty($user_info)) {
            return json([
                'code' => 0,
                'msg' => '用户不存在'
            ]);
        }

        return $next($request);
    }



}
