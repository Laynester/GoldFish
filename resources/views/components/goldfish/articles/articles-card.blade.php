@props(['news'])

@foreach ($news as $article)
    <div class="col-sm-12 col-md-4 mb-2">
        <div class="relative">
            <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-black ">
                <div class="col-12 relative rounded overflow-hidden article_box" style="background-image: url({{ $article->image }});">
                    <div class="position-absolute h-100 w-100 rounded" style="background-color: rgba(0,0,0,0.3); left: 0; z-index: 5;"></div>
                    <div class="text-white position-relative p-3" style="z-index: 10;">
                        <h4>{{ $article->caption }}</h4>
                        <p>{{ $article->desc }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endforeach