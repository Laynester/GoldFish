<div class="legacy-box grey preload meview">
    <div class="heading">{{ Auth::user()->username }}<small class="right">Last signed
            in: {{date('d/m/y h:ia', Auth::user()->last_login)}}</small></div>
    <div class="content">
        <div class="row justify-content-center overflow-hidden">
            <div class="col-5 col-sm-5" style="margin-top: -20px;">
                <div class="plate">
                    <img src="{{CMSHelper::settings('habbo_imager')}}{{ Auth::user()->look }}">
                </div>
            </div>
            <div class="col-7 col-sm-7">
                <div class="px-2 py-2 d-flex flex-column rounded text-white" style="font-size: 14px; background: rgba(0,0,0,0.5)">
                    <div>
                        <img class="w-6 h-6" src="{{ asset('legacy/images/motto.png') }}" alt="">
                        {{ Auth::user()->motto }}
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/credits.png') }}" alt="">
                        {{ Auth::user()->credits }} Credits
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/duckets.png') }}" alt="">
                        {{ Auth::user()->duckets->amount }} Duckets
                    </div>
                    <div class="d-flex align-items-center" style="gap: 5px;">
                        <img class="w-6 h-6" src="{{ asset('legacy/images/diamonds.png') }}" alt="">
                        {{ Auth::user()->diamonds->amount }} Diamonds
                    </div>
                </div>
            </div>
        </div>
        <div class="feed-items">
            @foreach(App\Models\CMS\Alerts::orderBy('id','DESC')->orderBy('userid', 'desc')->get() as $row)
                <div class="alert item @if($row->userid == 0) mass @endif">
                    <img src="{{CMSHelper::settings('c_images')}}album1584/{{$row->icon}}.gif"/>
                    <span>{{$row->message}}</span>
                    @if($row->userid == Auth::user()->id)
                        <a class="close" href="me/delete/{{$row->id}}">X</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
