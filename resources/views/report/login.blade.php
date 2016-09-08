@extends('report.layout') @section('title', 'Page Title') @section('content')
<div class="login">
  <form class="form-horizontal" method="post">
    <div class="weui_cells weui_cells_form">
      <div class="weui_cell">
        <div class="weui_cell_hd">
          <label class="weui_label weui_cell_hd">用户名</label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
          <input type="tel" name="username" class="weui_input" placeholder="请输入您的姓名" value="">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd">
          <label class="weui_label weui_cell_hd">手机号码</label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
          <input type="tel" name="phone" class="weui_input" placeholder="请输入您的手机号码" value="">
        </div>
      </div>
      <div class="weui_cell">
        <div class="weui_cell_hd">
          <label class="weui_label weui_cell_hd">密码</label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
          <input type="password" name="password" class="weui_input" placeholder="请输入您的密码" value="">
        </div>
      </div>
    </div>
    <button type="submit" class="weui_btn weui_btn_primary">提交</button>
  </form>
</div>
@endsection