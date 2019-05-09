@foreach ($news as $article)
<div class="box news newsArticle">
  <figure class="thumbnail" style="background-image:url({{$article->image}});">
    <h3>{{$article->caption}}</h3>
    <i>{{date('F d, Y', $article->date)}} - <a href="/home/{{$article->habbo->username}}">{{$article->habbo->username}}</a></i>
    <p>{{$article->desc}}</p>
  </figure>
</div>
<article class="newsArticle">
  <p>{!! $article->body !!}</p>
</article>
@endforeach
