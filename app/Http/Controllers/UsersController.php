<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Model\Fields;
use App\User;
use App\Http\Model\Roles;
use Auth;
use DB;

class UsersController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->model = new User();
    }
    
    public function getIndex(Request $request) {
        if($request->state != null){
            $this->model = $this->model->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $this->model->paginate($pre_page);
        $data = $data->toArray();
        $thead =  array('id'=>'ID','link'=>'链接地址', 'title'=>'链接标题', 'description'=>'描述');
        $out = array('title' => '字段', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file('users')->get();
        $out = array('title' => '新增用户', 'fields' => $fields);
        return response()->json($out);
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
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $fields = Fields::file('users')->get();
        $info = $this->model->find($id);
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
        $id = $request->id;
        $info = $this->model->find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $res = $info->update($request->all());
            DB::table('role_user')->where('user_id',$id)->delete();
            $groups = json_decode($request->groups);
            $roles = array();
            foreach ($groups as $r) {
                $role = array('user_id'=>$info->id,'role_id'=>$r);
                $roles[] = $role;
            }
            DB::table('role_user')->insert($roles);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
}