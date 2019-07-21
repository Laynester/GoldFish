@foreach ($news as $article)
<article class="newsList relative">
  <div class="legacy-news left">
    <a href="/community/articles/{{$article->id}}">
      <figure class="thumbnail" style="background-image:url({{$article->image}});"></figure>
    </a>
  </div>
  <div class="left">
      <h4>{{$article->caption}}</h4>
      <p>
      <i><a href="/home/{{$article->habbo->username}}">{{$article->habbo->username}}</a> - {{date('F d, Y', $article->date)}}</i>
      <p>{{$article->desc}}</p>
    </p>
  </div>
  <a class="right bottom" href="/community/articles/{{$article->id}}">Read more</a>
</article>
@endforeach
{{ $news->links() }}
