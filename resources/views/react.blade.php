<!DOCTYPE html>
<html lang="zh_CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <title>react</title>
    <link rel="shortcut icon" href="images/favicon.png" />
    <!--<link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">-->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="bower_components/animate.css/animate.css" rel="stylesheet">
    <link href="bower_components/weui/dist/style/weui.min.css" rel="stylesheet">
    <link href="resources/react/dist/style.map.css" rel="stylesheet">
    <!--<link href="less/style.less" rel="stylesheet/less">
    <script src="http://cdn.bootcss.com/less.js/2.7.1/less.min.js"></script>-->
</head>

<body>
    <div id="app"></div>
    <!--<script src="http://cdn.bootcss.com/react/15.1.0/react-with-addons.js"></script>-->
    <!--<script src="http://cdn.bootcss.com/react/15.1.0/react.js"></script>
    <script src="http://cdn.bootcss.com/react/15.1.0/react-dom.js"></script>
    <script src="http://cdn.bootcss.com/react-router/2.6.1/ReactRouter.js"></script>-->
    <script src="resources/js/react.js"></script>
    <script src="resources/js/react-dom.js"></script>
    <script src="resources/js/ReactRouter.js"></script>
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
    <script src="resources/js/SHA1.js"></script>
    <script src="resources/js/CryptoJS.js"></script>
    <script src="resources/react/dist/app.js"></script>
</body>

</html>