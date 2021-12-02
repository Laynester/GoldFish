@props(['otherArticles'])

<div class="box blue">
    <div class="heading">{{ __('Other articles') }}</div>
    <div class="content">
        <ul>
            @forelse($otherArticles as $article)
                <a href="{{ route('articles.show', $article) }}">
                    <li>{{ $article->caption }}</li>
                </a>
            @empty
                <p class="text-center alert alert-dark">{{ __('There is currently no other articles') }}</p>
            @endforelse
        </ul>
    </div>
</div>
