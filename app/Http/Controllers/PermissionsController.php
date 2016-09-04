<?php
namespace App\Http\Controllers;

use App\Http\Model\Fields;
use App\Http\Model\Permissions;
use Auth;
use DB;
use Illuminate\Http\Request;

class PermissionsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->model = new Permissions();
    }
    
    public function getIndex(Request $request) {
        if($request->state != null){
            $this->model = $this->model->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $this->model->paginate($pre_page);
        $data = $data->toArray();
        $thead = array('id'=>'ID','name'=>'权限key', 'display_name'=>'权限名称', 'description'=>'描述');
        $out = array('title' => '文章管理', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file('role_permissions')->get();
        $out = array('title' => '字段', 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $table = $request->list;
        $data = $request->except(['list','id']);
        $info = Permissions::create($data);
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $fields = Fields::file('role_permissions')->get();
        $info = Permissions::where('id',$id)->first();
        $roles = DB::table('role_user')->where('user_id',$id)->get();
        $role = array();
        foreach ($roles as $r) {
            $role[] = $r->role_id;
        }
        $role = json_encode($role);
        $info['roles'] = $role;
        $out = array('title' => '字段', 'fields' => $fields,'info' => $info);
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
}