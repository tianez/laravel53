<?php
namespace App\Http\Controllers;

use App\Http\Model\User;
use App\Http\Model\Fields;
use App\Http\Model\Article;
use Auth;
use DB;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    
    public function __construct() {
        // parent::__construct();
        $this->middleware('auth');
        $this->middleware('admin');
        $this->model = new Article();
    }
    
    public function getIndex(Request $request) {
        if($request->state != null){
            $this->model = $this->model->where('status', $request->state);
        }
        $pre_page = env('pre_page', 15);
        $data = $this->model->paginate($pre_page);
        $data = $data->toArray();
        $thead =  array('id'=>'ID','title'=>'标题', 'created_at'=>'发布时间');
        $out = array('title' => '文章管理', 'pages' => $data,'thead' => $thead);
        return response()->json($out);
    }
    
    public function getAdd(Request $request) {
        $fields = Fields::file('article')->get();
        $out = array('title' => '新增文章', 'fields' => $fields);
        return response()->json($out);
    }
    
    public function postAdd(Request $request) {
        $data = $request->all();
        $info = $this->model->create($data);
        $category = $request->category?$request->category:1;
        $add = array('article_id'=>$info->id,'cat_id'=>$category);
        DB::table('article_taxonomy')->insert($add);
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $fields = Fields::file('article')->get();
        $info = $this->model->find($id);
        $res = DB::table('article_taxonomy')->where('article_id',$id)->get();
        $res = $res->toArray();
        if($res){
            $info['category'] = $res[0]->cat_id;
        }
        $out = array('title' => '字段', 'fields' => $fields,'info' => $info);
        return response()->json($out);
    }
    
    public function postDetail(Request $request) {
        $id = $request->id;
        $info = Article::find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $res = $info->update($request->all());
            DB::table('article_taxonomy')->where('article_id',$id)->update(['cat_id'=>$request->category]);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
}