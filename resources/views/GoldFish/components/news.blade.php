@foreach ($news as $article)
<div class="box news">
  <a href="/community/articles/{{$article->id}}">
  <figure class="thumbnail" style="background-image:url({{$article->image}});">
</figure>
</a>
  <div class="shade">
  {{$article->caption}}
  </div>
</div>
@endforeach
