@extends('xbh.layout') @section('content')
<div class="header">
    <a onclick="window.history.back()" class="icon icon-left"></a>
    <h1>{{$data['category']}}</h1>
</div>
<div class="content">
  <div class="article">
    <div class="article_title">{{$data['title']}}</div>
    <div class="article_dec"><span>时间： {{$data['created_at']}}</span></div>
    <div class="article_hr"></div>
    <div class="article_content">
      {!! $data['content'] !!}
    </div>
  </div>
</div>
@endsection