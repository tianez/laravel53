<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Http\Model\User;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use App\Http\Model\Fields;
use Route;
use Storage;

use Schema;
use Illuminate\Database\Schema\Blueprint;

use Workerman\Worker;
use PHPSocketIO\SocketIO;


class CjyunController extends Controller {
    
    public function __construct() {
        // $this->middleware('auth',['except' => 'login']);
    }
    
    public function getIndex(Request $request) {
        // listen port 2021 for socket.io client
        // $io = new SocketIO(2021);
        // $io->on('connection', function($socket)use($io){
        //   $socket->on('chat message', function($msg)use($io){
        //     $io->emit('chat message', $msg);
        //   });
        // });
        
        // Worker::runAll();
        // 建立连接，@see http://php.net/manual/zh/function.stream-socket-client.php
        
        $client = stream_socket_client('tcp://127.0.0.1:7273');
        
        
        if(!$client)exit("can not connect");
        // 模拟超级用户，以文本协议发送数据，注意Text文本协议末尾有换行符（发送的数据中最好有能识别超级用户的字段），这样在Event.php中的onMessage方法中便能收到这个数据，然后做相应的处理即可
        // fwrite($client, '{"type":"send","content":"hello all", "user":"admin", "pass":"******"}'."\n");
        // fwrite($client, '{"type":"say","to_client_id":"all","from_client_name":"121212121","content":"haodeesdsdsd"}'."\n");
        
        //  dump('{"type":"system","to_client_id":"all","to_client_name":"sdsds","content":"感谢大家"}'."\n");
        $data = array(
        'type'=>'system',
        'to_client_id'=>'all',
        'to_client_name'=>'sdsds',
        'content'=>'感谢大家'
        );
        dump(json_encode($data));
        fwrite($client, json_encode($data)."\n");
        return view('tk');
    }
    
    /**
    * 生成签名URL
    * @access public
    *
    * @param string $url
    * @param array $params
    * @return string
    */
    protected function sign($url = '', array $params)
    {
        $time = time();
        $params['time'] = $time;
        $params['appid'] = $this->appid;
        ksort($params);
        $sign = http_build_query($params);
        $params['sign'] = md5(md5($sign) . $this->appid . $this->secret . $time);
        
        return $url . '?' . http_build_query($params);
    }
    
}