<!DOCTYPE html>
<html lang="zh_CN">

<head>
  <title>播放器</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./front/chat/style.css" rel="stylesheet">
</head>

<body>
<passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>
  <div id="app"></div>
  <script src="./js/web_socket.js"></script>
  <script src="./js/superagent.js"></script>
  <script src="./js/react.js"></script>
  <script src="./js/react-dom.js"></script>
  <script>
    var vurl = 'http://app.cjyun.org/video/player/index?vid=12&thumb=&sid=10076&next=&autoStart=0&type=stream'
    var ht = 'SWFObject 2提供两种优化flash播放器的嵌入方法：基于标记的方法和依赖于js的方法。'
  </script>
  <script src="./front/chat/js/app.js"></script>
  <script>
    function socket() {
      // 创建websocket
      ws = new WebSocket("ws://" + document.domain + ":8282");
      // 当socket连接打开时，输入用户名
      ws.onopen = onopen;
      // 当有消息时根据消息类型显示不同信息
      ws.onmessage = onmessage;
      ws.onclose = function() {
        console.log("连接关闭，定时重连");
        socket();
      };
      ws.onerror = function() {
        console.log("出现错误");
      };
    }
    socket();
    // 连接建立时发送登录信息
    function onopen() {
      var username = localStorage.username || ''
      var userid = localStorage.userid || 0
      var login_data = '{"type":"login","client_name":"' + username + '","client_userid":"' + userid + '","room_id":"1"}';
      console.log("websocket握手成功，发送登录数据:" + login_data);
      ws.send(login_data);
    }

    // 服务端发来消息时
    function onmessage(e) {
      // console.log(e.data);
      var data = eval("(" + e.data + ")");
      switch (data['type']) {
        // 服务端ping客户端
        case 'ping':
          ws.send('{"type":"pong"}');
          break;;
        case 'login':
          console.log(JSON.parse(e.data));
          break;;
        case 'system':
          comment(JSON.parse(e.data));
          break;
        case 'number':
          console.log(JSON.parse(e.data));
          break;
      }
    }
  </script>
</body>

</html>