<?php
namespace App\Http\Controllers;

use App\Http\Model\Report;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        $user = session('report_user');
        if(empty($user)){
            return redirect('login');
        }
        $category = Category::where('taxonomy','category')->first();
        return redirect('tyg/list/'.$category->id);
    }
    
    public function getList(Request $request,$id) {
        $user = session('report_user');
        if(empty($user)){
            return redirect('login');
        }
        $pre_page = env('pre_page', 15);
        $category = Category::where('taxonomy','category')->get();
        $cur = Category::find($id);
        $data = $cur->Article()->orderBy('order', 'desc')->orderBy('created_at', 'asc')->paginate($pre_page);
        $data = $data->toArray();
        $out = array('title' => $cur->category_name, 'cur' => $cur, 'category' => $category,'data' => $data);
        return view('report.home',$out);
    }
    public function getShow(Request $request,$id) {
        $user = session('report_user');
        if(empty($user)){
            return redirect('login');
        }
        $data = Article::find($id);
        $data->increment('view', 1);
        $category = $data->Tags()->where('taxonomy','category')->get();
        if($category){
            $data['category'] = $category[0]->category_name;
        }
        $data = $data->toArray();
        $out = array('title' => $data['title'], 'data' => $data);
        return view('report.show',$out);
    }
    
    public function getLogin(Request $request) {
        $user = session('report_user');
        if($user){
            return redirect('/');
        }
        $out = array('title' => '登陆');
        return view('report.login',$out );
    }
    
    public function postLogin(Request $request) {
        $name =  trim($request->username," ");
        $password = $request->password;
        $request->flashOnly('username', 'phone');
        if(empty($name) ||empty($password) ){
            $request->session()->flash('msg', '用户名/密码不能为空！');
        }else if($password!=='123456'){
            $request->session()->flash('msg', '查询密码错误，请重新输入！');
        }else{
            $user = Report::where('username', $name)->first();
            if($user){
                $user->islogin = 1;
                $user->save();
                session(['report_user' => $user]);
            }else {
                $request->session()->flash('msg', '该用户不存在，请核实后再输入！');
            }
        }
        return redirect()->back();
    }
    
    public function getLogout(request $request) {
        $user = session('report_user');
        if(empty($user)){
            return redirect('login');
        }
        $request->session()->forget('report_user');
        $request->session()->flash('msg', '你已经成功登出!');
        return redirect()->back();
    }
}