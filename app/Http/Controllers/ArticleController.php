<?php
namespace App\Http\Controllers;

use App\Http\Model\Fields;
use App\Http\Model\Article;
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
        $validator = $this->model->Validator($data);
        $out = array();
        if($validator->fails()){
            $messages = $validator->errors()->messages();
            foreach ($messages as $key => $message) {
                return response($message[0], 401);
            }
        }else{
            $info = $this->model->create($data);
            $this->taxonomy($data,$info->id);
            $out['msg']= '保存成功！';
            $out['info']= $info->toArray();
        }
        return response()->json($out);
    }
    
    public function getDetail($id) {
        $fields = Fields::file('article')->get();
        $info = $this->model->find($id);
        $res = DB::table('article_taxonomy')->where('article_id',$id)->get();
        $res = $res->toArray();
        if($res){
            $info['category'] = $res[0]->cat_id;
        }
        $tags = $info->Tags()->where('taxonomy','tags')->get();
        $tag = array();
        foreach ($tags as $t) {
            $tag[] = $t->id;
        }
        $tag = json_encode($tag);
        $info['tags'] = $tag;
        $out = array('title' => '编辑文章', 'fields' => $fields,'info' => $info);
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
            $data = $request->all();
            $res = $info->update($data);
            DB::table('article_taxonomy')->where('article_id',$id)->delete();
            $this->taxonomy($data,$id);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
    
    private function taxonomy($data,$article_id){
        if(!isset($data['tags'])){
            $category = 1;
        }else{
            $category = $data['category'];
        }
        $adds = array();
        $add = array('article_id'=>$article_id,'cat_id'=>$category);
        $adds[] = $add;
        if(isset($data['tags'])){
            $tags = json_decode($data['tags']);
            foreach ($tags as $tag) {
                $add = array('article_id'=>$article_id,'cat_id'=>$tag);
                $adds[] = $add;
            }
        }
        DB::table('article_taxonomy')->insert($adds);
    }
    
    public function getDelete($id) {
        $info = $this->model->destroy($id);
        $roles = DB::table('article_taxonomy')->where('article_id',$id)->delete();
        $out = array('title' => '删除文章','msg'=>'文章删除成功！');
        return response()->json($out);
    }
}