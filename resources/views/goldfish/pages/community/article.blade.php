@extends('layouts.base')
@section('content')
@section('title', $article->caption)
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="box" style="padding: 0;">
            <div class="d-flex align-items-center justify-content-center relative"
                 style="height: 130px; background-image:url({{$article->image}});">
                <div class="position-absolute h-100 w-100"
                     style="background-color: rgba(0,0,0, 0.2); z-index: 5;"></div>
                <div class="d-flex flex-column">
                    <h3 class="text-white" style="z-index: 10;">{{$article->caption}}</h3>
                    <p style="z-index: 10;" class="w-100 d-flex justify-content-center text-white z-10">{{$article->desc}}</p>
                </div>
            </div>
            <div class="content p-4">
                <article>
                    {!! $article->body !!}
                </article>
                <p class="mt-4 font-weight-bold">- {{ $article->habbo->username }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        @include('components.community.latest-news')
        @include('components.twitter')
        @include('components.discord')
    </div>
  </div>
</div>
@endsection
