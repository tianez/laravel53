<!DOCTYPE html>
<html lang="zh_CN">
<head>
  <title>{{$title}}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <base href="http://<?php echo $_SERVER['HTTP_HOST'];?>" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="bower_components/weui/dist/style/weui.css" rel="stylesheet">
  <link href="front/css/report.css" rel="stylesheet">
</head>
<body>
  @if (session('msg'))
  <div class="weui_dialog_alert" id="weui_dialog_alert" style="display: block;">
    <div class="weui_mask"></div>
    <div class="weui_dialog">
      <div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div>
      <div class="weui_dialog_bd">{{ session('msg') }}</div>
      <div class="weui_dialog_ft"><a class="weui_btn_dialog primary" onclick="document.getElementById('weui_dialog_alert').style.visibility='hidden'">确定</a></div>
    </div>
  </div>
  @endif @yield('content')
</body>

</html>