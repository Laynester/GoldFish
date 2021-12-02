@extends('layouts.base')

@section('title', 'Photos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if($photos->isEmpty())
                <h3 class="center">{{ __('No photos posted.') }}</h3>
            @else
                <div class="grid-275">
                    @foreach ($photos as $photo)
                        <figure class="photo">
                            <div class="image" style="background-image:url({{$photo->url}})">
                                <div class="bottom">
                                    {{date('d/m/y h:i', $photo->timestamp)}}
                                </div>
                            </div>
                            <div class="user_info">
                                <img src="{{ CMSHelper::settings('habbo_imager') }}{{ $photo->habbo->look }}&headonly=1">
                                {{ $photo->habbo->username}}
                            </div>
                            <p class="end"></p>
                        </figure>
                    @endforeach
                </div>
            
                {{$photos->links()}}
            @endif
        </div>
    </div>
</div>
@endsection
