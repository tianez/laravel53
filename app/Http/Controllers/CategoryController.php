<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Category;

use App\Http\Model\Fields;
use DB;

class CategoryController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Category();
        $this->files = 'article_category';
        $this->title = '分类';
        $this->thead = array('id'=>'ID','category_name'=>'分类名称', 'category_des'=>'分类描述');
    }
    
    public function postAdd(Request $request) {
        $data = $request->all();
        if($request->taxonomy =='tags'){
            $data['pid'] = 0;
        }
        $info = $this->model->create($data);
        $out = array();
        $out['msg']= '保存成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
        
    public function postDetail(Request $request) {
        $id = $request->id;
        $info = Category::find($id);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'] = '没有发现相关数据！';
        }else{
            $data = $request->all();
            if($request->taxonomy =='tags'){
                $data['pid'] = 0;
            }
            $res = $info->update($data);
            $out['res'] = $res;
            $out['msg'] = '保存成功！';
        }
        return response()->json($out);
    }
    public function getDelete($id) {
        $info = $this->model->destroy($id);
        $roles = DB::table('article_taxonomy')->where('cat_id',$id)->delete();
        $out = array('title' => '删除分类','msg'=>'分类删除成功！');
        return response()->json($out);
    }
}