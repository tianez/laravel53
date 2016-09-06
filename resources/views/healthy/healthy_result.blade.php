@extends('healthy.layout') @section('title', 'Page Title') @section('content')
<div class="weui_btn_area">
  <div class="weui_btn weui_btn_primary">查询结果</div>
</div>
<section class='result'>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>你的姓名</td>
        <td>{{$user->tj_name}}</td>
        <td>身份证号</td>
        <td>{{ (isset($user->china_id) && $user->china_id!=='') ? $user->china_id : '暂无' }}</td>
      </tr>
      <tr>
        <td>体检单号</td>
        <td>{{$user->tj_id}}</td>
        <td>手机号码</td>
        <td>{{$user->mobile_phone or '暂无'}}</td>
      </tr>
      <tr>
        <td>体检日期</td>
        <td>2015-08-21 14:53:02</td>
        <td>报告日期</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</section>
<div class="weui_btn_area">
  <a href="logout" class="weui_btn weui_btn_primary">退出登录</a>
</div>
<section class='result'>
  <table class="table table-bordered">
    <tr>
      <th>体检项目</th>
      <th>详细报告</th>
    </tr>
    @foreach ($res as $key=> $r)
    <tr>
      <td>{{$key}}</td>
      <td>{!!$r!!}</td>
    </tr>
    @endforeach
  </table>
</section>
@endsection