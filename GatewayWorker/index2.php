<?php
use Workerman\Worker;
require_once './Workerman/Autoloader.php';

// 创建一个Worker监听2345端口，使用http协议通讯
// $http_worker = new Worker("Websocket://0.0.0.0:2345");
$http_worker = new Worker("Websocket://0.0.0.0:2345");

// 启动4个进程对外提供服务
$http_worker->count = 4;

header('content-type:application:json;charset=utf8');  
header('Access-Control-Allow-Origin:*');  
// header('Access-Control-Allow-Methods:POST');  
header('Access-Control-Allow-Headers:x-requested-with,content-type');  

// 接收到浏览器发送的数据时回复hello world给浏览器
$http_worker->onMessage = function($connection, $data)
{
    // 向浏览器发送hello world
    var_dump($data);
    $data = json_decode($data);
    $connection->send( $data->content.'hello world');
};

$http_worker->onWorkerStart = function($http_worker)
{
    echo "Worker starting...\n";
};
$http_worker->onConnect = function($connection)
{
    echo "new connection from ip " . $connection->getRemoteIp() . "\n";
};

$http_worker->onClose = function($connection)
{
    echo "connection closed\n";
};
// 运行worker
Worker::runAll();