<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class HealthyController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth',['except' => 'login']);
    }
    
    public function getIndex(Request $request) {
        $user = session('cur_user');
        if($user){
            $results = DB::table('tj_result')->where('tj_id', $user->tj_id)->get();
            $res = array();
            foreach ($results as $result) {
                if ($result->result == ' 空')
                    continue;
                if (empty($res[$result->item])) {
                    $res[$result->item] = $result->result;
                } else {
                    $res[$result->item] .= '<br>' . $result->result;
                }
            }
            $d['res'] = $res;
            $d['user'] = $user;
            return view('healthy.healthy_result',$d);
        }else{
            return view('healthy.healthy');
        }
    }
    
    public function postIndex(Request $request) {
        $name = $request->id;
        $password = $request->password;
        if(empty($name) ||empty($password) ){
            $request->session()->flash('msg', '体检单号或查询密码不能为空！');
        }else{
            $user = DB::table('tj_member')->where('tj_id', $name)->where('password', $password)->first();
            if($user){
                session(['cur_user' => $user]);
            }else {
                // $request->session()->flash('msg', '不好意思，系统瞌睡了，请您再试试叫醒她!');
                $request->session()->flash('msg', '对不起，您的账号信息不存在!');
            }
        }
        return redirect()->back();
    }

}