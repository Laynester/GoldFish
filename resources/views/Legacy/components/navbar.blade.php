<ul class="navi">
  @foreach(CMSHelper::getMenu() as $menuItem)
   <li {{ $menuItem->url ? '' : "class=dropdown" }} {{ (str_contains(strtolower($menuItem->url), strtolower($group)) ? 'class=selected' : '' ) }}><a href="/{{$menuItem->url}}">{{ $menuItem->title }}</a></li>
  @endforeach
  @if (Auth::user())
   @if(auth()->user()->rank >= CMSHelper::fuseRights('dashboard'))
     <li class="red"><a href="/housekeeping">Housekeeping</a></li>
   @endif
  @endif
</ul>
<ul class="subnavi">
  @foreach(App\Models\CMS\Menu::children(strtolower($group))->orderBy('order','asc')->Get() as $item)
  <li {{ (Request::is($item->url) ? 'class=selected' : '') }}><a @if (Auth::user()) href="/{!! str_replace('%username%',Auth()->User()->username, $item->url) !!}"@else href="/{{ $item->url }}" @endif>{{ $item->title}}</a></li>
  @endforeach
</ul>
