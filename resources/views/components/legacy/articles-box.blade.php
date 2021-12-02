@props(['news', 'otherArticles'])

<div class="legacy-box news">
    <div class="row">
        <div class="col-lg-7">
            @foreach ($news as $article)
                <figure class="topStory-slider" style="background-image:url({{$article->image}}); cursor: pointer;"
                        onclick="window.location.href='/community/articles/{{$article->id}}'">
                    <span class="title">{{$article->caption}}</span>
                    <span class="desc">
                        <span class="meta">
                            <a href="/home/{{ $article->habbo->username }}">{{ $article->habbo->username }}</a> - {{ date('F d, Y', $article->date) }}
                        </span>

                        {{ $article->desc }}
                      </span>
                </figure>
            @endforeach
        </div>
        <div class="col-lg-5">
            <div class="heading">{{ __('Other articles') }}</div>
            <ul>
                @forelse ($otherArticles as $article)
                    <li>
                        <a href="{{ route('articles.index', $article) }}">
                            {{ $article->caption }}
                        </a>
                    </li>
                @empty
                    <p>{{ __('There is currently no other articles') }}</p>
                @endforelse
            </ul>
            <a href="{{ route('articles.index') }}" class="readmore">{{ __('All articles') }} &raquo;</a>
        </div>
    </div>
</div>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("topStory-slider");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.visibility = "hidden";
            slides[i].style.opacity = "0";
            slides[i].style.zindex = "1";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.visibility = "visible";
        slides[slideIndex - 1].style.opacity = "1";
        slides[slideIndex - 1].style.zindex = "2";
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
</script>
