<!DOCTYPE html>
<html lang="zh_CN">

<head>
  <title>workerman-chat PHP聊天室 Websocket(HTLM5/Flash)+PHP多进程socket实时推送技术</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body id="body">
  <script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
  <script>
    // 如果服务端不在本机，请把127.0.0.1改成服务端ip
    var socket = io('ws://www.mycms.com:2345');
    // ws = new WebSocket("ws://"+document.domain+":2345");
    // 当连接服务端成功时触发connect默认事件
    socket.on('connect', function() {
      console.log('connect success');
    });
  </script>
</body>

</html>