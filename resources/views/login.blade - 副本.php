<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<title>用户登陆</title>
		<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<style>
		.form-control-feedback {
			right: 5px !important;
			line-height: 46px;
		}
	</style>

	<body>
		<div class="container">
        @if (session('msg'))
        <div class="alert alert-warning">
        {{ session('msg') }}
        </div>
        @endif
			<form class="form-horizontal" method="post" style="max-width: 500px; margin: 0 auto;margin-top: 60px;">
				<div class="form-group form-group-lg has-feedback">
					<label class="control-label sr-only" for="id">体检单号</label>
					<div class="input-group">
						<span class="input-group-addon">体检单号</span>
						<input type="text" name="id" class="form-control" id="id" aria-describedby="inputGroupSuccess1Status">
					</div>
					<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					<span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
				</div>
				<div class="form-group form-group-lg has-feedback">
					<label class="control-label sr-only" for="password">查询密码</label>
					<div class="input-group">
						<span class="input-group-addon">查询密码</span>
						<input type="text" name="password" class="form-control" id="password" aria-describedby="inputGroupSuccess1Status">
					</div>
					<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					<span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
				</div>
				<div class="form-group form-group-lg">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-lg btn-primary btn-block">提交查询</button>
				</div>
			</form>
		</div>
	</body>

</html>