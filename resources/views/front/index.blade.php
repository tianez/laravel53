<!DOCTYPE html>
<html lang="zh_CN">

<head>
    <title>react</title>
    <meta charset="UTF-8">
    <!--H5页面窗口自动调整到设备宽度，并禁止用户缩放页面-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <!--忽略将页面中的数字识别为电话号码-->
    <meta name="format-detection" content="telephone=no" />
    <!--忽略Android平台中对邮箱地址的识别-->
    <meta name="format-detection" content="email=no" />
    <!--当网站添加到主屏幕快速启动方式，可隐藏地址栏，仅针对ios的safari-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!--将网站添加到主屏幕快速启动方式，仅针对ios的safari顶端状态条的样式-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="shortcut icon" href="images/favicon.png" />
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="bower_components/animate.css/animate.css" rel="stylesheet">
    <link href="bower_components/weui/dist/style/weui.min.css" rel="stylesheet">
    <link href="front/front/css/style.css" rel="stylesheet">
</head>

<body>
    <div id="app"></div>
    <script src="js/react.js"></script>
    <script src="js/react-dom.js"></script>
    <script src="js/ReactRouter.js"></script>
    <script>
        if (typeof module === 'object') {
            window.module = module;
            module = undefined;
        }
    </script>
    <script>
        if (window.module) module = window.module;
    </script>
    <script src="bower_components/storedb/storedb.js"></script>
    <script src="js/CryptoJS.js"></script>
    <script src="front/front/js/app.js"></script>
</body>

</html>