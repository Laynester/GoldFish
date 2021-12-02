<div class="legacy-box">
    <div class="heading">{{ __('Search') }}</div>

    <div class="content">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        <form action="{{ route('me.search') }}" method="post">
            <div class="form-group">
                @csrf

                <input type="text" name="search" placeholder="{{ __('Search for a :hotelname', ['hotelname' => CMSHelper::settings('hotelname')]) }}">
            </div>
        </form>
    </div>
</div>
