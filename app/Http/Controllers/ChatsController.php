<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Model\Chat;

class ChatsController extends MainController {
    
    public function __construct() {
        parent::__construct();
        $this->model = new Chat();
        $this->files = 'chat';
        $this->title = '直播评论';
        $this->thead = array('id'=>'ID','content'=>'内容', 'username'=>'用户名');
    }
    
    public function postAdd(Request $request) {
        $msg = $request->all();
        $msg['head_img'] = './images/avatar/'.rand(0,6).'.jpg';
        $msg['time'] = time();
        if(!isset($msg['user_id'])){
            $msg['user_id'] = 1;
        }
        $info = $this->model->create($msg);
        if (empty($info)) {
            return response('出错了！', 503);
        }
        $msg['type'] = 'system';
        $msg['to_client_id'] = 'all';
        if($info){
            $client = stream_socket_client('tcp://127.0.0.1:7273');
            if(!$client)exit("can not connect");
            fwrite($client, json_encode($msg)."\n");
        }
        $out = array();
        $out['msg']= '新增成功！';
        $out['info']= $info->toArray();
        return response()->json($out);
    }
}