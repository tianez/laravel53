<?php
namespace App\Http\Controllers;

use App\Http\Model\Fields;
use Illuminate\Http\Request;

use Auth;
use DB;

class MainController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->title = '标题名称';
        $this->thead = array('id'=>'ID'); //列表页显示项目
        $this->pre_page = env('pre_page', 10); //分页每页数目
    }
    
    public function getIndex(Request $request) {
        if($request->state != null){
            $this->model = $this->model->where('status', $request->state);
        }
        $data = $this->model->paginate($this->pre_page);
        $data = $data->toArray();
        $out = array('title' => $this->title.'管理', 'pages' => $data,'thead' => $this->thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file($this->files)->get();
        $out = array('title' => '新增'.$this->title, 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $info = $this->model->create($request->all());
        if (empty($info)) {
            return response('出错了！', 503);
        }
        $out = array();
        $out['msg']= '新增成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail($id) {
        $info = $this->model->find($id);
        if (empty($info)) {
            return response('没有发现相关数据！', 404);
        }
        $fields = Fields::file($this->files)->get();
        $roles = DB::table('db_role_user')->where('user_id',$id)->get();
        $role = array();
        foreach ($roles as $r) {
            $role[] = $r->role_id;
        }
        $role = json_encode($role);
        $info['roles'] = $role;
        $out = array('title' => $this->title.'编辑', 'fields' => $fields,'info' => $info);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $info = $this->model->find($request->id);
        if (empty($info)) {
            return response('没有发现相关数据！', 404);
        }
        $res = $info->update($request->all());
        $out = array();
        $out['res'] = $res;
        $out['msg'] = '保存成功！';
        return response()->json($out);
    }
    
    public function getDelete($id) {
        $info = $this->model->destroy($id);
        if (empty($info)) {
            return response('没有发现相关数据！', 404);
        }
        $out = array('msg' => $this->title.'删除成功！');
        return response()->json($out);
    }
}