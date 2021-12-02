@extends('layouts.base')

@section('title', $article->caption)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="box" style="padding: 0;">
                    <div class="d-flex align-items-center justify-content-center relative"
                         style="height: 130px; background-image:url({{ $article->image }}); background-size: cover;">
                        <div class="position-absolute h-100 w-100"
                             style="background-color: rgba(0,0,0, 0.2); z-index: 5;"></div>

                        <div class="d-flex flex-column">
                            <h3 class="text-white" style="z-index: 10;">
                                {{ $article->caption }}
                            </h3>
                            <p class="w-100 d-flex justify-content-center text-white"
                               style="z-index: 10;">{{ $article->desc }}</p>
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
                <x-goldfish.articles.other-articles :otherArticles="$otherArticles"/>
                <x-goldfish.twitter-box/>
                <x-goldfish.discord-box/>
            </div>
        </div>
    </div>
@endsection
