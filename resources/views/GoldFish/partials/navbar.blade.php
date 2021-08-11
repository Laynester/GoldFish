<div class="navbar">
   <div class="container">
      <ul class="navigation">
         @if (!Auth::user())
          <li><a href="/" @if($group == 'home') class="selected" @endif>Home</a></li>
          <li><a href="/register"  @if($group == 'register') class="selected" @endif>Register</a></li>
         @endif
         @foreach(CMSHelper::getMenu() as $menuItem)
          <li {{ $menuItem->url ? '' : "class=dropdown" }}><a href="/{{$menuItem->url}}" {{ (str_contains(strtolower($menuItem->url), strtolower($group)) ? 'class=selected' : '' ) }}>{{ $menuItem->title }}</a></li>
         @endforeach
         @if (Auth::user())
          @if(CMSHelper::fuseRights('dashboard'))
            <li><a href="/housekeeping">Housekeeping</a></li>
          @endif
            <a class="enter_hotel right relative" href="{{ route('game.index') }}" target="_blank">Enter {{CMSHelper::settings('hotelname')}}</a>
            <a class="enter_hotel right relative" href="{{ route('nitro.index') }}" target="_blank">Enter {{CMSHelper::settings('hotelname')}} (HTML5)</a>
         @endif
      </ul>
   </div>
</div>
<div class="sub-navigation">
   <div class="container">
      <ul class="navigation">
         @foreach(App\Models\CMS\Menu::children(strtolower($group))->orderBy('order','asc')->Get() as $item)
         <li><a @if (Auth::user()) href="/{!! str_replace('%username%',Auth()->User()->username, $item->url) !!}"@else href="/{{ $item->url }}" @endif {{ (Request::is($item->url) ? 'class=selected' : '') }}>{{ $item->title}}</a></li>
         @endforeach
      </ul>
   </div>
</div>
