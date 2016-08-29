<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller {
    
    public function __construct() {
        $this->middleware('auth',['except' => ['getIndex','postLogin','getLogout']]);
    }
    
    public function getIndex(Request $request) {
        return view('admin');
    }
    
    public function getUser(Request $request) {
        return response()->json(Auth::user());
    }
    
    public function getMeun(Request $request) {
        $meun = DB::table('meun')->get()->toArray();
        return response()->json($meun);
    }
    
    public function getList(Request $request) {
        $page = empty($_GET['page']) ? 1 : $_GET['page'];
        $table = $_GET['list'];
        $pre_page = env('pre_page', 15);
        $data = DB::table($table)->paginate($pre_page);
        $data = $data->toArray();
        $thead = array();
        $thead['th'] = array('id','key', 'title', 'f_module');
        $thead['td'] = array('ID','字段key', '字段名称', '字段模块');
        $thead['tds'] = array('id'=>'ID','key'=>'字段key', 'title'=>'字段名称', 'f_module'=>'字段模块');
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
        $info = DB::table($table)->insert($data);
        $out = array();
        if (empty($info)) {
            $out['res'] = 404;
            $out['msg'][] = '出错了！';
        }else{
            $out['msg'][] = '保存成功！';
        }
        return response()->json($out);
    }
    
    public function getDetail(Request $request) {
        $id = $request->id;
        $table = $request->list;
        $fields = DB::table('fields')->where('f_module',$table)->get();
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
            $out['msg'][] = '没有发现相关数据！';
        }else{
            $data = $request->except(['list']);
            $res = DB::table($table)->where('id', $id)->update($data);
            $out['res'] = $res;
            $out['msg'][] = '保存成功！';
        }
        return response()->json($out);
    }
    
    public function postLogin(request $request) {
        $req = $request->all();
        $data = array('user_name' => $req['username'], 'password' => $req['password']);
        $auth = Auth::attempt($data, true);
        $res = array();
        if ($auth) {
            $res['state'] = 'ok';
            $res['data'] =  Auth::user();
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