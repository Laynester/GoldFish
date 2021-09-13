@extends('Installation.layouts.installation')

@section('step', '2')

@section('content')
<div class="col-lg-6">
    <div class="box grey">
        <p>{{ __('This is your website configuration, this can later be changed through the database, or through your hotel housekeeping!') }}</p>
        <p><strong>{{ __('WARNING: ') }}</strong>{{ __('You must have an existing SWF Directory, otherwise your hotel will not function properly.') }}</p>
        <br>
        <small>
            {{ __('It is recommended to use the avatar imager, provided by the nitro team, which can be found here: ') }}
            <a href="https://git.krews.org/nitro/nitro-imager" target="_blank">{{ __('Avatar imager') }}</a>
        </small>
    </div>
    <div class="habblet" id="habblet" style="display:none;">
    </div>
</div>
<div class="col-lg-6">
    @if($errors->any())
        <div class="box red">
            @foreach($errors as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <form method="post" action="{{ route('installation.step.update', 2) }}">
        @csrf
        <div class="box">
            <h2>CMS Config</h2>
            <div class="form-group">
                <label for="title">Hotel Name:</label>
                <input class="inputs"
                       type="text"
                       placeholder="Hotel Name"
                       value="{{ CMSHelper::settings('hotelname') }}"
                       name="hotelname"/>
            </div>
            <div class="form-group">
                <label for="title">Hotel Logo:</label>
                <input class="inputs"
                       type="text"
                       placeholder="Hotel Logo"
                       value="{{ CMSHelper::settings('site_logo') }}"
                       name="logo"/>
            </div>
            <div class="form-group">
                <label for="title">Habbo Imager:</label>
                <input class="inputs" type="text" placeholder="Alert" value="{{ CMSHelper::settings('habbo_imager') }}"
                       name="imager"/>
            </div>
            <div class="form-group">
                <label for="title">Default Motto:</label>
                <input class="inputs" type="text" placeholder="Motto" value="{{CMSHelper::settings('default_motto')}}"
                       name="motto"/>
            </div>
            <div class="form-group">
                <label for="title">Group Badge Location:</label>
                <input class="inputs" type="text" value="{{CMSHelper::settings('group_badges')}}" name="groupbadges"/>
            </div>
            <div class="form-group">
                <label for="title">Site Theme</label>
                <select name="theme" onkeypress="changePreview(this.value)" onchange="changePreview(this.value)">
                    <option value="goldfish">Goldfish</option>
                    <option value="legacy">Legacy</option>
                </select>
            </div>
        </div>
        <span class="controls">
            <button class="green-step-two" type="submit">Continue</button>
{{--            <a class="red" href="{{ route('installation.index') }}">Back</a>--}}
        </span>
        @csrf
    </form>
</div>
<script>
    function changePreview(input) {
        $('#habblet').css("background-image", "url('/install/" + input + "_preview.png')").css("display", "block");
    }
</script>
@endsection
