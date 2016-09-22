<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use App\Http\Model\Fields;
use Auth;
use DB;
use Illuminate\Http\Request;

// use App\Events\SomeEvent;

class AdminController extends Controller {
    
    public function __construct() {
        $this->middleware('auth',['except' => ['getIndex','postLogin','getLogout']]);
    }
    
    public function getIndex(Request $request) {
        $user = Auth::user();
        // event(new SomeEvent($user));
        if($user){
            $user_id = $user->id;
            $roles = $this->getRoles($user_id);
            $permits = $this->getPermits($user_id);
            $perms = $this->getPerms();
            $request->session()->put('roles', $roles);
            $request->session()->put('permits', $permits);
            $request->session()->put('perms', $perms);
        }
        return view('admin');
    }
    
    public function getUser(Request $request) {
        return response()->json(Auth::user());
    }
    
    public function getMeun(Request $request) {
        $meun = DB::table('meun')->get()->toArray();
        $roles = $this->getRoles(Auth::user()->id);
        if(in_array(1,$roles)){
            $mm = $meun;
        }else{
            $mm = array();
            foreach ($meun as $m) {
                $r = json_decode($m->roles);
                $in = array_intersect($roles,$r);
                if(count($in)>0){
                    $mm[] = $m;
                }
            }
        }
        return response()->json($mm);
    }
    
    public function postLogin(request $request) {
        $req = $request->all();
        $data = array('user_name' => $req['username'], 'password' => $req['password']);
        $auth = Auth::attempt($data, true);
        $res = array();
        if ($auth) {
            $res['state'] = 'ok';
            $res['data'] =  Auth::user();
            $user_id = Auth::user()->id;
            $roles = $this->getRoles($user_id);
            $permits = $this->getPermits($user_id);
            $perms = $this->getPerms();
            $request->session()->put('roles', $roles);
            $request->session()->put('permits', $permits);
            $request->session()->put('perms', $perms);
        } else {
            $res['msg'] = '用户名或密码错误！';
        }
        return response()->json($res);
    }
    
    public function getLogout(request $request) {
        Auth::logout();
        $res['msg'] = '用户登出成功';
        return response()->json($res);
    }
    
    public function postImport(Request $request) {
        $stime = mtime();
        $data = $request->all();
        $res = array();
        $res['state'] = 'error';
        $filename = $_FILES["file"]['name'];
        $type = substr($filename, strrpos($filename, '.') + 1);
        if ($type != 'sql') {
            $res['msg'] = '上传的数据格式不对，请上传.sql格式的数据文件。';
        } else {
            $sql = file_get_contents($_FILES['file']['tmp_name']);
            $a = explode(";", $sql);
            array_pop($a);
            $table = $data['table'];
            $add = 0;
            $updata = 0;
            if ($table == 'member') {
                foreach ($a as $b) {
                    $c = $this -> str($b);
                    $d['tj_id'] = str_replace(' ', '', $c[0]);
                    $d['tj_name'] = str_replace(' ', '', $c[1]);
                    // $d['tj_name'] = substr_replace($c[1], "■", 3, 3);
                    // $c[2] = str_replace(' ', '', $c[2]);
                    // $d['china_id'] = $c[2]==0?'':$c[2];
                    $d['password'] = str_replace(' ', '', $c[3]);
                    $d['c_time'] = $c[4];
                    $user = DB::table('tj_member')->where('tj_id', $d['tj_id'])->first();
                    if ($user) {
                        DB::table('tj_member')->where('tj_id', $d['tj_id'])
                        ->update($d);
                        $updata++;
                    } else {
                        $result =DB::table('tj_member') -> insert($d);
                        $add++;
                    }
                }
                $etime = mtime()-$stime;
                $res['state'] = 'ok';
                $res['msg'] = "体检用户导入成功！新增" . $add . "条数据，更新" . $updata . "条数据，耗时".$etime."秒";
            } elseif ($table == 'result') {
                $d = array();
                foreach ($a as $b) {
                    $c = $this -> str($b);
                    $e = array();
                    $e['tj_id'] = str_replace(' ', '', $c[0]);
                    $e['item'] = $c[1];
                    $e['result'] = $c[2];
                    $r = DB::table('tj_result')->where('tj_id', $e['tj_id'])
                    ->where('item', $e['item'])
                    ->where('result', $e['result'])->first();
                    if (!$r) {
                        array_push($d,$e);
                        $add++;
                    }
                }
                $result =DB::table('tj_result') -> insert($d);
                $etime = mtime()-$stime;
                $res['state'] = 'ok';
                $res['msg'] =  "体检结果导入成功！新增" . $add . "条数据，耗时".$etime."秒";
            } else {
                $res['msg'] ='出错啦';
            }
        }
        return response()->json($res);
    }
    
    //  分解数据字段
    private function str($arr) {
        $length = strpos($arr, "(") + 1;
        $arr = substr_replace($arr, "", 0, $length);
        $arr = substr_replace($arr, "", -1, 1);
        $a = array("'" => "");
        $arr = strtr($arr, $a);
        $arr = explode(",", $arr);
        return $arr;
    }
}