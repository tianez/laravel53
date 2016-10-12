<!DOCTYPE html>
<html lang="zh_CN">

<head>
  <title>播放器</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./front/chat/css/style.css" rel="stylesheet">
</head>

<body>
  <div id="app"></div>
  <script src="./js/web_socket.js"></script>
  <script src="./js/superagent.js"></script>
  <script src="./js/react.js"></script>
  <script src="./js/react-dom.js"></script>
  <script>
    var vurl = 'http://app.cjyun.org/video/player/index?vid=12&thumb=&sid=10076&next=&autoStart=0&type=stream'
    var ht = '{{$ht}}'
  </script>
<script src="./js/socket.io-1.4.5.js"></script>
<script src="./front/chat/js/chat.js"></script>
  <script src="./front/chat/js/app.js"></script>
</body>

</html>