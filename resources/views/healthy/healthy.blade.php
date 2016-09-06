@extends('healthy.layout') 
@section('title', 'Page Title') 
@section('content')
<form class="form-horizontal" method="post">
  <div class="weui_cells_title">体检查询</div>
  <div class="weui_cells weui_cells_form">
    <div class="weui_cell">
      <div class="weui_cell_hd">
        <label class="weui_label weui_cell_hd">体检单号2</label>
      </div>
      <div class="weui_cell_bd weui_cell_primary">
        <input type="tel" name="id" class="weui_input" placeholder="请输入体检单号" value="">
      </div>
    </div>
    <div class="weui_cell">
      <div class="weui_cell_hd">
        <label class="weui_label weui_cell_hd">查询密码</label>
      </div>
      <div class="weui_cell_bd weui_cell_primary">
        <input type="tel" name="password" class="weui_input" placeholder="请输入查询密码" value="">
      </div>
    </div>
  </div>
  <div class="weui_btn_area">
    <button type="submit" class="weui_btn weui_btn_primary">提交查询</button>
  </div>
</form>
@endsection