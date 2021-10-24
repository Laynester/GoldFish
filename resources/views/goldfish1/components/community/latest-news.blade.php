<div class="box blue">
    <div class="heading">Other articles</div>
    <div class="content">
        <ul>
            @forelse($recentArticles as $article)
                <a href="{{ route('articles.show', $article) }}">
                    <li>{{ $article->caption }}</li>
                </a>
            @empty
                <p class="text-center alert alert-dark">There's currently no other articles</p>
            @endforelse

        </ul>
    </div>
</div>
