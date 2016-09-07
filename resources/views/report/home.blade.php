@extends('report.layout')  @section('content')
    <div class="weui_tab">
      <div class="weui_navbar">
        @foreach ($category as $cat)
        @if($cur->id ==$cat->id) 
        <div class="weui_navbar_item weui_bar_item_on">
          {{$cat->category_name}}
        </div>
        @else
        <a href="{{$cat->id}}" class="weui_navbar_item">
          {{$cat->category_name}}
        </a>
        @endif
        @endforeach
      </div>
      <div class="weui_tab_bd">
      @foreach ($data['data'] as $d)
          <a href="/show/{{$d['id']}}" class="weui_media_box weui_media_appmsg">
            @if(isset($d['thumb']))
            <?php $thumb = json_decode($d['thumb']); ?>
            <div class="weui_media_hd">
                <img class="weui_media_appmsg_thumb" src="{{$thumb[0]}}" alt="">
            </div>
            @endif
            <div class="weui_media_bd">
                <h4 class="weui_media_title">{{$d['title']}}</h4>
                <p class="weui_media_desc">{{$d['excerpt']}}</p>
            </div>
          </a>
        @endforeach
        </div>
</div>
@endsection