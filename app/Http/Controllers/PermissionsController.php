<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Permissions;

use App\Http\Model\Fields;
use DB;

class PermissionsController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Permissions();
        $this->files = 'permissions';
        $this->title = '权限';
        $this->thead = array('id'=>'ID','name'=>'权限key', 'display_name'=>'权限名称', 'description'=>'描述');
    }
    
    public function postAdd(Request $request) {
        $table = $request->list;
        $data = $request->except(['list','id']);
        $info = Permissions::create($data);
        if($info){
            $groups = json_decode($data['roles']);
            $roles = array();
            foreach ($groups as $r) {
                $role = array('permission_id'=>$info->id,'role_id'=>$r);
                $roles[] = $role;
            }
            DB::table('role_permission')->insert($roles);
        }
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail($id) {
        $fields = Fields::file('permissions')->get();
        $info = Permissions::where('id',$id)->first();
        $roles = DB::table('role_permission')->where('permission_id',$id)->get();
        $role = array(); 
        foreach ($roles as $r) {
            $role[] = $r->role_id;
        }
        $role = json_encode($role);
        $info['roles'] = $role;
        $out = array('title' => '权限', 'fields' => $fields,'info' => $info);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $id = $request->id;
        $info = Permissions::find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $res = $info->update($request->all());
            DB::table('role_permission')->where('permission_id',$id)->delete();
            $groups = $request->roles?json_decode($request->roles):array();
            $roles = array();
            foreach ($groups as $r) {
                $role = array('permission_id'=>$id,'role_id'=>$r);
                $roles[] = $role;
            }
            DB::table('role_permission')->insert($roles);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
    
    public function getDelete($id) {
        $info = $this->model->destroy($id);
        $roles = DB::table('role_permission')->where('permission_id',$id)->delete();
        $out = array('title' => '删除权限字段');
        return response()->json($out);
    }
}