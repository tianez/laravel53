@extends('xbh.layout')  @section('content')
<div class="list">
    <div class="weui_tab">
      <img src="/front/xbh/images/top.png" class="top"></img>
      <div class="weui_navbar">
        @foreach ($category as $cat)
        @if($cur->id ==$cat->id) 
        <div class="weui_navbar_item weui_bar_item_on">
          {{$cat->category_name}}
        </div>
        @else
        <a href="list/{{$cat->id}}" class="weui_navbar_item">
          {{$cat->category_name}}
        </a>
        @endif
        @endforeach
      </div>
      <div class="weui_tab_bd">
      @foreach ($data['data'] as $d)
          <a href="/show/{{$d['id']}}" class="weui_media_box weui_media_appmsg">
            <div class="weui_media_bd">
                <h4 class="weui_media_title">{{$d['title']}}</h4>
                <p class="weui_media_desc"><span>{{$d['created_at']}}</span></p>
            </div>
          </a>
        @endforeach
        </div>
</div>
</div>
@endsection