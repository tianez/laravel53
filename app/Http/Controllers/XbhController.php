<?php
namespace App\Http\Controllers;

use App\Http\Model\Report;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class XbhController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        
    }
    
    public function getIndex(Request $request) {
        $category = Category::where('taxonomy','category')->first();
        return redirect('list/'.$category->id);
    }
    
    public function getList(Request $request,$id) {
        $pre_page = env('pre_page', 15);
        $category = Category::where('taxonomy','category')->get();
        $cur = Category::find($id);
        $data = $cur->Article()->orderBy('order', 'desc')->orderBy('created_at', 'asc')->paginate($pre_page);
        $data = $data->toArray();
        $out = array('title' => $cur->category_name, 'cur' => $cur, 'category' => $category,'data' => $data);
        return view('Xbh.home',$out);
    }

    public function getShow(Request $request,$id) {
        $data = Article::find($id);
        $data->increment('view', 1);
        $category = $data->Tags()->where('taxonomy','category')->get();
        if($category){
            $data['category'] = $category[0]->category_name;
        }
        $data = $data->toArray();
        $out = array('title' => $data['title'], 'data' => $data);
        return view('Xbh.show',$out);
    }
    
}