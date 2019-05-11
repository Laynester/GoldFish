<div class="navbar">
  <div class="container">
    <ul class="navigation">
@foreach(App\Models\CMS\Menu::orderBy('order','asc')->where('group', null)->get() as $menuItem)
   <li {{ $menuItem->url ? '' : "class=dropdown" }}>
     <a href="/{{$menuItem->url}}" {{ (str_contains(strtolower($menuItem->url), strtolower($group)) ? 'class=selected' : '' ) }}>
        {{ $menuItem->title }}
     </a>
  </li>
@endforeach
@if(CMSHelper::hotelstatus() == '1')
<a class="enter_hotel right relative offline" href="#" target="_blank">
  Hotel is offline
</a>
@else
<a class="enter_hotel right relative" href="{{ route('client') }}" target="_blank">
  Enter {{CMSHelper::settings('hotelname')}}
</a>
@endif
</ul>
</div>
</div>
<div class="sub-navigation">
  <div class="container">
    <ul class="navigation">
      @foreach(App\Models\CMS\Menu::children(strtolower($group))->orderBy('order','asc')->Get() as $item)
        <li><a href="/{!! str_replace('%username%', Auth()->User()->username, $item->url) !!}" {{ (Request::is($item->url) ? 'class=selected' : '') }}>{{ $item->title}}</a></li>
      @endforeach
    </ul>
  </div>
</div>
