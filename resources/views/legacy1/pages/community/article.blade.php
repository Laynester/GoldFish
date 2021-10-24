@extends('layouts.master')
@section('title', 'Article -')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="newsArticle">
      <figure class="thumbnail" style="background-image:url({{$news->image}});">
        <h3>{{$news->caption}}</h3>
        <i>{{date('F d, Y', $news->date)}} - <a href="/home/{{$news->habbo->username}}">{{$news->habbo->username}}</a></i>
        <p>{{$news->desc}}</p>
      </figure>
    </div>
    <article class="newsArticle">
      <p>{!! $news->body !!}</p>
      <b>-{{$news->habbo->username}}</b>
    </article>
  </div>
  <div class="col-md-4">
    @include('components.constant.discord')
    @include('components.constant.twitter')
  </div>
</div>
@endsection
