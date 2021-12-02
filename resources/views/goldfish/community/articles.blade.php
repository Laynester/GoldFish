@extends('layouts.base')

@section('title', 'News')

@section('content')
    <div class="container">
        <div class="row">
            <x-goldfish.articles.articles-card :news="$news"/>
        </div>

        {{-- Pagination links --}}
        {{ $news->links() }}
    </div>
@endsection
