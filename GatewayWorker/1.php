<?php
require_once '/GatewayClient/Gateway.php';

/**
*====这个步骤是必须的====
*这里填写Register服务的ip（通常是运行GatewayWorker的服务器ip）和端口
*注意Register服务端口在start_register.php中可以找到（chat默认是1236）
*这里假设GatewayClient和Register服务都在一台服务器上，ip填写127.0.0.1
**/
Gateway::$registerAddress = '127.0.0.1:1238';


// 以下是调用示例，接口与GatewayWorker环境的接口一致
// 注意除了不支持sendToCurrentClient和closeCurrentClient方法
// 其它方法都支持
Gateway::sendToAll('{"type":"say","to_client_id":"all","from_client_name":"121212121","content":"haodeesdsdsd","time":"'.date('Y-m-d H:i:s').'"}');

// Gateway::sendToClient($client_id,'{"type":"say","content":"hello"}');

// Gateway::isOnline($client_id);

// Gateway::bindUid($client_id, $uid);

// Gateway::sendToUid($client_id, $uid);

// Gateway::getSession($client_id);
echo '122';