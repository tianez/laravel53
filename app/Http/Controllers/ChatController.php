<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Model\Chat;
use App\Http\Model\Topic;

class ChatController extends Controller {
    
    public function __construct() {
        // $this->middleware('auth',['except' => ['getIndex','getList','postLogin']]);
        $this->model = new Chat();
    }
    
    public function getIndex(Request $request) {
        $topic = Topic::first();
        dump($topic);
        return view('chat.index');
    }
    
    public function postIndex(Request $request) {
        // 模拟超级用户，以文本协议发送数据，注意Text文本协议末尾有换行符（发送的数据中最好有能识别超级用户的字段），这样在Event.php中的onMessage方法中便能收到这个数据，然后做相应的处理即可
        // fwrite($client, '{"type":"say","to_client_id":"all","from_client_name":"121212121","content":"haodeesdsdsd"}'."\n");
        $msg = $request->all();
        $msg['type'] = 'system';
        $msg['to_client_id'] = 'all';
        $msg['time'] = time();
        
        $validator = $this->model->Validator($msg);
        if($validator->fails()){
            $messages = $validator->errors()->messages();
            foreach ($messages as $key => $message) {
                return response($message[0], 401);
            }
        }
        $info = Chat::create($msg);
        if($info){
            $client = stream_socket_client('tcp://127.0.0.1:7273');
            if(!$client)exit("can not connect");
            fwrite($client, json_encode($msg)."\n");
        }
        return;
        // return view('chat.index');
    }
    
    public function getList(Request $request) {
        $res = Chat::orderBy('id', 'desc')->get();
        return response()->json($res);
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