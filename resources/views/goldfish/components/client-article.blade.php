<div class="news" id="news">
  <div class="header">
  <img src="{{CMSHelper::settings('site_logo')}}"/>
  <div class="band">We publish it before you know it!<button class="close" onclick="closeNews()"></button></div>
  </div>
  <div class="content">
    @foreach(App\Models\CMS\News::orderBy('date', 'DESC')->take(1)->get(); as $article)
    <figure class="thumbnail left" style="background-image:url({{$article->image}});"></figure><h3>{{$article->caption}}</h3>
      <i>{{$article->desc}}</i>
      <p>{!!$article->body !!}</p>
    @endforeach
  </div>
</div>
