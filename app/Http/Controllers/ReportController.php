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
        return redirect('list/1');
    }
    
    public function getList(Request $request,$id) {
        $user = session('report_user');
        if(empty($user)){
            return redirect('login');
        }
        $pre_page = env('pre_page', 15);
        $category = Category::where('taxonomy','category')->get();
        $cur = Category::find($id);
        $data = $cur->Article()->paginate($pre_page);
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
        $name = $request->username;
        $phone = $request->phone;
        $password = $request->password;
        if(empty($name) ||empty($phone) ||empty($password) ){
            $request->session()->flash('msg', '用户名/手机号码/密码不能为空！');
        }else{
            $user = Report::where('username', $name)->where('phone', $phone)->first();
            if($user){
                session(['report_user' => $user]);
            }else {
                $user = Report::create($request->all());
                session(['report_user' => $user]);
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