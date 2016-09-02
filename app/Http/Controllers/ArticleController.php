<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Http\Model\User;
use App\Http\Model\Fields;
use App\Http\Model\Article;
use Auth;
use DB;
use Illuminate\Http\Request;

class ArticleController extends AdminController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getList(Request $request) {
        $table = $request->list;
        $db = DB::table($table);
        // if(!$this->canIndex($request)){
        //     $db = $db->where('uid',Auth::user()->id);
        // }
        if($request->state != null){
            $db = $db->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $db->paginate($pre_page);
        $data = $data->toArray();
        $theads = array();
        $thead = array();
        $theads['fields'] = array('id'=>'ID','key'=>'字段key', 'title'=>'字段名称', 'f_module'=>'字段模块','status'=>'状态');
        $theads['meun'] = array('id'=>'ID','link'=>'链接地址', 'title'=>'链接标题', 'description'=>'描述');
        $theads['roles'] = array('id'=>'ID','name'=>'用户组标识', 'display_name'=>'用户组名称', 'description'=>'描述');
        $theads['role_permissions'] = array('id'=>'ID','name'=>'权限key', 'display_name'=>'权限名称', 'description'=>'描述');
        $theads['article'] = array('id'=>'ID','title'=>'标题', 'created_at'=>'发布时间');
        $theads['article_category'] = array('id'=>'ID','category_name'=>'分类名称', 'category_des'=>'分类描述');
        if(isset($theads[$table])){
            $thead = $theads[$table];
        }else{
            $thead = array('id'=>'ID', 'description'=>'描述');
        }
        $out = array('title' => '字段', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $table = $_GET['list'];
        $fields = DB::table('fields')->where('f_module',$table)->get();
        $out = array('title' => '字段', 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $table = $request->list;
        $data = $request->except(['list','id']);
        // $data['created_at'] =  date("Y-m-d H:i:s");
        $info = Article::create($data);
        $out = array();
        $out['msg']= '保存成功2！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $table = $request->list;
        $fields = Fields::file($table)->get();
        $info = DB::table($table)->where('id',$id)->first();
        $out = array('title' => '字段', 'fields' => $fields,'info' => $info);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $id = $request->id;
        $table = $request->list;
        $info = DB::table($table)->find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $data = $request->except(['list']);
            $data['updated_at'] =  date("Y-m-d H:i:s");
            $res = DB::table($table)->where('id', $id)->update($data);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
}