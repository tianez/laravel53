<?php
/**
* This file is part of workerman.
*
* Licensed under The MIT License
* For full copyright and license information, please see the MIT-LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @author walkor<walkor@workerman.net>
* @copyright walkor<walkor@workerman.net>
* @link http://www.workerman.net/
* @license http://www.opensource.org/licenses/mit-license.php MIT License
*/

/**
* 用于检测业务代码死循环或者长时间阻塞等问题
* 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
* 然后观察一段时间workerman.log看是否有process_timeout异常
*/
//declare(ticks=1);

/**
* 聊天主逻辑
* 主要是处理 onMessage onClose
*/
use \GatewayWorker\Lib\Gateway;
use \GatewayWorker\Lib\Db;


class Events
{
    
    public static function onConnect($client_id)
    {
        $new_message = array(
        'type'=>'number',
        'number'=>Gateway::getAllClientCount(),
        'time'=>date('Y-m-d H:i:s'),
        );
        // Gateway::sendToCurrentClient("Your client_id is $client_id");
        Gateway::sendToAll(json_encode($new_message));
    }
    /**
    * 有消息时
    * @param int $client_id
    * @param mixed $message
    */
    public static function onMessage($client_id, $message)
    {
        // debug
        echo "client:{$_SERVER['REMOTE_ADDR']}:{$_SERVER['REMOTE_PORT']} gateway:{$_SERVER['GATEWAY_ADDR']}:{$_SERVER['GATEWAY_PORT']}  client_id:$client_id session:".json_encode($_SESSION)." onMessage:".$message."\n";
        // $ret = Db::instance('db1')->select('*')->from('db_users')->query();
        // var_dump($ret);
        
        // 客户端传递的是json数据
        $message_data = json_decode($message, true);
        if(!$message_data)
        {
            return ;
        }
        
        // 根据类型执行不同的业务
        switch($message_data['type'])
        {
            // 客户端回应服务端的心跳
            case 'pong':
                return;
                case 'login':
                    // 判断是否有房间号
                    if(!isset($message_data['room_id']))
                    {
                    throw new \Exception("\$message_data['room_id'] not set. client_ip:{$_SERVER['REMOTE_ADDR']} \$message:$message");
                }
                // 把房间号昵称放到session中
                $room_id = $message_data['room_id'];
                $client_name = htmlspecialchars($message_data['client_name']);
                $_SESSION['room_id'] = $room_id;
                $_SESSION['client_name'] = $client_name;
                $_SESSION['client_userid'] = $message_data['client_userid'];
                $_SESSION['created_at'] = $created_at =  date('Y-m-d H:i:s');
                
                $insert_id = Db::instance('db1')->insert('db_chat_log')->cols(array('client_id'=>$client_id, 'userid'=>$message_data['client_userid'], 'ip'=>$_SERVER['REMOTE_ADDR'] ,'created_at'=>$created_at))->query();
                return;
                case 'system':
                    Gateway::sendToAll(json_encode($message_data));
                    return;
            }
        }
        
        /**
        * 当客户端断开连接时
        * @param integer $client_id 客户端id
        */
        public static function onClose($client_id)
        {
            // debug
            echo "client:{$_SERVER['REMOTE_ADDR']}:{$_SERVER['REMOTE_PORT']} gateway:{$_SERVER['GATEWAY_ADDR']}:{$_SERVER['GATEWAY_PORT']}  client_id:$client_id onClose:''\n";
            $new_message = array(
            'type'=>'number',
            'number'=>Gateway::getAllClientCount(),
            'time'=>date('Y-m-d H:i:s'),
            );
            // $insert_id = Db::instance('db1')->update('db_chat_log')->cols(array('client_id'=>$client_id, 'userid'=>$message_data['client_userid'], 'created_at'=>date('Y-m-d H:i:s')))->query();
            echo  $query = "UPDATE db_chat_log SET updated_at = '".date('Y-m-d H:i:s')."' WHERE created_at='". $_SESSION['created_at']."' and client_id='".$client_id."';";
            $row_count = Db::instance('db1')->query($query);
            Gateway::sendToAll(json_encode($new_message));
        }
        
    }