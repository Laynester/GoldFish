<div class="{{(CMSHelper::settings('goldfish_cards') == 0 ? 'topStory-box' : 'grid-200')}}">
    @foreach ($news as $article)
        <div class="box news {{(CMSHelper::settings('goldfish_cards') == 0 ? 'topStory-slider' : '')}}">
            <a href="/community/articles/{{$article->id}}" class="news_link">
                <figure class="thumbnail" style="background-image:url({{$article->image}});">
                </figure>
            </a>
            @if(CMSHelper::settings('goldfish_cards') == 1)
                <div class="shade">
                    {{$article->caption}}
                </div>
            @else
                <h4 class="title">{{$article->caption}}</h4>
                <div class="meta">
                    {{date('F d, Y', $article->date)}} | <a
                            href="/home/{{$article->habbo->username}}">{{$article->habbo->username}}</a>
                </div>
                <div class="desc">{{$article->desc}}</div>
            @endif
        </div>
    @endforeach
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
