<div class="grid-3">
@foreach ($news as $article)
<div class="box news">
  <img class="thumbnail" src="{{$article->image}}">
  {{$article->caption}}
</div>
@endforeach
</div>
