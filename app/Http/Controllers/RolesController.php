<?php
namespace App\Http\Controllers;

use App\Http\Model\Fields;
use App\Http\Model\Roles;
use Auth;
use DB;
use Illuminate\Http\Request;

class RolesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->model = new Roles();
    }
    
    public function getIndex(Request $request) {
        if($request->state != null){
            $this->model = $this->model->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $this->model->paginate($pre_page);
        $data = $data->toArray();
        $thead =array('id'=>'ID','name'=>'用户组标识', 'display_name'=>'用户组名称', 'description'=>'描述');
        $out = array('title' => '文章管理', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file('roles')->get();
        $out = array('title' => '字段', 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $data = $request->all();
        $info = $this->model->create($data);
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $fields = Fields::file('roles')->get();
        $info = Roles::where('id',$id)->first();
        $out = array('title' => '字段', 'fields' => $fields,'info' => $info);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $id = $request->id;
        $info = Roles::find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $data = $request->except(['list']);
            $res = Roles::where('id', $id)->update($data);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
}