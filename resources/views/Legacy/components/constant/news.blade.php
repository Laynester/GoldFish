<div class="legacy-box news">
  <div class="row">
    <div class="col-lg-7">
    @foreach ($news as $article)
    <figure class="topStory-slider" style="background-image:url({{$article->image}});" onclick="window.location.href='/community/articles/{{$article->id}}'">
      <span class="title">{{$article->caption}}</span>
      <span class="desc">
        <span class="meta"><a href="/home/{{$article->habbo->username}}">{{$article->habbo->username}}</a> - {{date('F d, Y', $article->date)}}</span>
        {{$article->desc}}
      </span>
    </figure>
    @endforeach
    </div>
    <div class="col-lg-5">
      <div class="heading">Whats new?</div>
      <ul>
        @foreach (App\Models\CMS\News::skip('3')->take('7')->orderBy('date','DESC')->get() as $article)
        <li><a href="/community/articles/{{$article->id}}">{{$article->caption}}</a></li>
        @endforeach
      </ul>
      <a href="/community/articles/" class="readmore">Read more &raquo;</a>
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
      slides[i].style.opacity= "0";
      slides[i].style.zindex = "1";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.visibility = "visible";
    slides[slideIndex-1].style.opacity = "1";
    slides[slideIndex-1].style.zindex = "2";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
  }
</script>
