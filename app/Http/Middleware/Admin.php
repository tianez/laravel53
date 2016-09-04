<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $user_id = $user->id;
        $roles = $request->session()->get('roles', [2]);
        if (in_array(1, $roles)) {
            //如果用户拥有管理员权限则直接跳过后面的权限验证
            return $next($request);
        }

        $action = $request->route()->getAction()['controller'];
        // $action = substr_replace($actions['controller'], '', 0, 21);
        // dump($action);
        $p = explode("@", $action);
        if ($p[1] == 'postAdd') {
            $action = $p[0] . '@getAdd';
        }
        $perms = $request->session()->get('perms');
        $out = array();
        if (!in_array($action, $perms)) {
            return response('你没有权限访问该页面或进行该操作！', 401);
        }
        return $next($request);
    }
}