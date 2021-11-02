@extends('layouts.master')
@section('title', 'Article -')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="newsArticle">
                <figure class="thumbnail" style="background-image:url({{ $article->image }});">
                    <h3>{{ $article->caption }}</h3>
                    <i>{{ date('F d, Y', $article->date )}} -
                        <a href="/home/{{ $article->habbo->username }}">{{ $article->habbo->username }}</a></i>
                    <p>{{ $article->desc }}</p>
                </figure>
            </div>
            <article class="newsArticle">
                <p>{!! $article->body !!}</p>
                <b>-{{ $article->habbo->username }}</b>
            </article>
        </div>
        <div class="col-md-4">
            @include('components.constant.discord')
            @include('components.constant.twitter')
        </div>
    </div>
@endsection
