@props(['news'])

@foreach ($news as $article)
    <article class="newsList relative">
        <div class="legacy-news left">
            <a href="/{{ route('articles.show', $article) }}">
                <figure class="thumbnail" style="background-image:url({{ $article->image }});"></figure>
            </a>
        </div>
        <div class="left">
            <h4>
                {{ $article->caption }}
            </h4>
            <p>
                <i>
                    <a href="{{ route('profile.show', $article->habbo) }}">{{ $article->habbo->username }}</a> - {{ date('F d, Y', $article->date) }}
                </i>
            <p>
                {{ $article->desc }}
            </p>
        </div>
        <a class="right bottom" href="{{ route('articles.show', $article) }}">{{ __('Read more') }}</a>
    </article>
@endforeach
{{ $news->links() }}
