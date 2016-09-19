<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ChatController extends Controller {
    
    public function __construct() {
        // $this->middleware('auth',['except' => 'login']);
    }
    
    public function getIndex(Request $request) {
        return view('chat.index');
    }
    
    public function postIndex(Request $request) {
        // 模拟超级用户，以文本协议发送数据，注意Text文本协议末尾有换行符（发送的数据中最好有能识别超级用户的字段），这样在Event.php中的onMessage方法中便能收到这个数据，然后做相应的处理即可
        // fwrite($client, '{"type":"send","content":"hello all", "user":"admin", "pass":"******"}'."\n");
        // fwrite($client, '{"type":"say","to_client_id":"all","from_client_name":"121212121","content":"haodeesdsdsd"}'."\n");
        //  dump('{"type":"system","to_client_id":"all","to_client_name":"sdsds","content":"感谢大家"}'."\n");
        // $data = array(
        // 'type'=>'system',
        // 'to_client_id'=>'all',
        // 'to_client_name'=>'sdsds',
        // 'content'=> $request->content
        // );
        $msg =array( 
            'type'=>'system',
            'to_client_id'=>'all',
        );
        $msg['user_id'] = Auth::user()->id;
        $msg['username'] = Auth::user()->user_name;
        $msg['head_img'] = Auth::user()->head_img?:'./images/avatar/'.rand(0,6).'.jpg';
        $msg['content'] = $request->content;
        $msg['time'] = time();
        // date("Y/m/d");
        dump($msg);
        $this->chat($msg);
        return;
        // return view('chat.index');
    }
    
    private function chat($data){
        $client = stream_socket_client('tcp://127.0.0.1:7273');
        if(!$client)exit("can not connect");
        fwrite($client, json_encode($data)."\n");
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
            return response('用户名或密码错误！', 401);
        }
        // die('用户名或密码错误！');
        // exit('用户名或密码错误！');
        return response()->json($res);
    }
    
}