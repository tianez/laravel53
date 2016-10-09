<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Storage;
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
        $res = DB::table('db_config')->where('name','chat_view')->increment('value');
        $chat_view = DB::table('db_config')->where('name','chat_view')->first();
        return view('chat.index', ["ht"=>$topic->content,'chat_view' => $chat_view->value]);
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
        $res = Chat::orderBy('id', 'desc')->limit(3)->get();
        return response()->json($res);
    }
    
    public function postLogin(request $request) {
        $req = $request->all();
        $data = array('user_name' => $req['username'], 'password' => $req['password']);
        $auth = Auth::attempt($data, true);
        $res = array();
        if (!$auth) {
            return response('用户名或密码错误！', 401);
        }
        // die('用户名或密码错误！');
        // exit('用户名或密码错误！');
        User::where('id',Auth::user()->id)->increment('login_totals');
        return response()->json(Auth::user());
    }
    public function postRegister(request $request) {
        $req = $request->all();
        $data = array('user_name' => $req['username'], 'password' => $req['password']);
        $user = new User;
        $validator = $user->Validator($data);
        if($validator->fails()){
            $messages = $validator->errors()->messages();
            foreach ($messages as $key => $message) {
                return response($message[0], 401);
            }
        }
        $info = User::create($data);
        DB::table('role_user')->insert(array('user_id'=>$info->id,'role_id'=>3));
        return response()->json($info);
    }
    
    public function postAvatar(Request $request) {
        $data = $request->all();
        $file = $_FILES["file"];
        $filename = $file['name'];
        $extname = strtolower(strrchr($filename,"."));
        $randNum = rand(9999, 100000);
        $filepath = './avatar/'.date('Ymd').'/'.time().'-'.$randNum.$extname;
        $res = Storage::put($filepath,file_get_contents($_FILES['file']['tmp_name']));
        if($res){
            $file = array_except($file,['tmp_name']);
            $file['filepath'] = $filepath;
            return response()->json($file);
        }
    }
}