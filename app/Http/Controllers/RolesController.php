<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Http\Model\Fields;
use App\Http\Model\Roles;
use Auth;
use DB;
use Illuminate\Http\Request;

class RolesController extends AdminController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getList(Request $request) {
        $table = $request->list;
        $db = DB::table($table);
        if($request->state != null){
            $db = $db->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $db->paginate($pre_page);
        $data = $data->toArray();
        $thead =  array('id'=>'ID','link'=>'链接地址', 'title'=>'链接标题', 'description'=>'描述');
        $out = array('title' => '字段', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file('roles')->get();
        $out = array('title' => '字段', 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $table = $request->list;
        $data = $request->except(['list','id']);
        $info = Roles::create($data);
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $fields = Fields::file('article')->get();
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