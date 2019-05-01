@foreach ($news as $article)
<div class="box news">
  <figure class="thumbnail" style="background-image:url({{$article->image}});">
</figure>
  <div class="shade">
  {{$article->caption}}
  </div>
</div>
@endforeach
