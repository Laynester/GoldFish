@extends('layouts.master')

@section('title', $article->caption)

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div>
                <div class="bg-white rounded-lg">
                    <figure class="article_header" style="background-image:url({{ $article->image }});">
                        <h3>
                            {{ $article->caption }}
                        </h3>

                        <p class="text-center">
                            {{ $article->desc }}
                        </p>
                    </figure>

                    <article class="p-3">
                        <p>{!! $article->body !!}</p>
                        <b>-{{ $article->habbo->username }}</b>
                    </article>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <x-legacy.discord-widget/>
            <x-legacy.twitter-widget/>
        </div>
    </div>
@endsection
