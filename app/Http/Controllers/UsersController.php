<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Model\Fields;
use App\User;
use App\Http\Model\Roles;
use Auth;
use DB;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class UsersController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new User();
        $this->files = 'users';
        $this->title = '用户';
        $this->thead = array('id'=>'ID','user_name'=>'用户名');
    }
    
    public function postAdd(Request $request) {
        $data = $request->all();
        $info = $this->model->create($data);
        if($info){
            $groups = json_decode($data['groups']);
            $roles = array();
            foreach ($groups as $r) {
                $role = array('user_id'=>$info->id,'role_id'=>$r);
                $roles[] = $role;
            }
            DB::table('role_user')->insert($roles);
        }
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail($id) {
        $info = $this->model->find($id);
        if (empty($info)) {
            return response('没有发现相关数据！', 404);
        }
        $fields = Fields::file('users')->get();
        $roles = DB::table('role_user')->where('user_id',$id)->get();
        $role = array();
        foreach ($roles as $r) {
            $role[] = $r->role_id;
        }
        $role = json_encode($role);
        $info['groups'] = $role;
        $out = array('title' => '字段', 'fields' => $fields,'info' => $info,'role'=>$role);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $info = $this->model->find($request->id);
        if (empty($info)) {
            return response('没有发现相关数据！', 404);
        }
        $res = $info->update($request->all());
        DB::table('role_user')->where('user_id',$id)->delete();
        $groups = json_decode($request->groups);
        $roles = array();
        foreach ($groups as $r) {
            $role = array('user_id'=>$info->id,'role_id'=>$r);
            $roles[] = $role;
        }
        DB::table('role_user')->insert($roles);
        $out = array();
        $out['res'] = $res;
        $out['msg'] = '保存成功！';
        return response()->json($out);
    }
}