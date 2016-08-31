<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use App\Http\Model\Permissions;
use App\Http\Model\Roles;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    // 列表页数据筛选显示
    protected function canIndex($request, $uid = 'uid') {
        $roles = $request->session()->get('roles', [2]);
        if (in_array(1, $roles)) {
            return true;
        }
        return false;
    }
    
    //判断当前用户是否有权访问该内容
    protected function gate($request, $id) {
        if ($this->gate) {
            $user_id = Auth::user()->id;
            $roles = $request->session()->get('roles', []);
            if (in_array(1, $roles)) {
                return true;
            }
            if ($user_id == $id && $id) {
                return true;
            }
            $permits = $request->session()->get('permits', []);
            $actions = $request->route()->getAction();
            $permit = substr_replace($actions['controller'], '', '0', '21') . '_all';
            $p = explode("@", $permit);
            if (in_array($p[1], $permits)) {
                return true;
            }
            if (in_array($permit, $permits)) {
                return true;
            }
            return false;
        }
        return true;
    }
    
    //获取用户拥有的用户组
    protected function getRoles($user_id) {
        $roles = User::find($user_id)->Roles->toArray();
        $group = array();
        foreach ($roles as $role) {
            $group[] = $role['id'];
        }
        if ($group == []) {
            $group[] = 2;
        }
        return $group;
    }
    
    //获取系统权限设置
    protected function getPerms() {
        $permissions = Permissions::all();
        $perms =  array();
        foreach ($permissions as $permission) {
            $perms[] = $permission['name'];
        }
        return $perms;
    }
    
    //获取当前用户拥有的权限
    protected function getPermits($user_id) {
        // $roles = User::find($user_id)->Roles->toArray();
        $roles =  $this->getRoles($user_id);
        if (in_array(1, $roles)) {
            $permits = $this->getPerms();
            return  $permits;
        }
        $permits = array();
        foreach ($roles as $role) {
            $permissions = Roles::find($role)->Permissions->toArray();
            foreach ($permissions as $permission) {
                if (!in_array($permission['name'], $permits)) {
                    array_push($permits, $permission['name']);
                }
            }
        }
        return $permits;
    }
}