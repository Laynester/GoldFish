@props(['photos'])

@if($photos->isEmpty())
    <hr>
    <h3 class="center">{{ __('No photos posted.') }}</h3>
    <hr>
@else
    <hr>
    <h3 class="center">My Photos</h3>
    <hr>
    <div class="grid-275">
        @foreach ($photos as $photo)
            <figure class="photo profile">
                <div class="image" style="background-image:url({{$photo->url}})">
                    <div class="bottom">
                        {{date('d/m/y h:i', $photo->timestamp)}}
                    </div>
                </div>
                <div class="user_info">
                    <img src="{{CMSHelper::settings('habbo_imager')}}{{ $photo->habbo->look }}&headonly=1">
                    {{$photo->habbo->username}}
                </div>
            </figure>
        @endforeach
    </div>
@endif
