@extends('report.layout') @section('content')
<div class="article">
  <div class="bd">
    <article class="weui_article">
      <h1>{{$data['title']}}</h1>
      <section>
      {!! $data['content'] !!}
      </section>
    </article>
  </div>
</div>
@endsection