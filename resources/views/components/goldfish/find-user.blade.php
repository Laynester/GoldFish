<div class="box">
    <div class="heading">{{ __('Find a user') }}</div>
    <div class="content">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        <form action="{{ route('me.search') }}" method="post">
            <div class="form-group">
                @csrf

                <input type="text" class="form-control" name="search" placeholder="Search for a {{ CMSHelper::settings('hotelname') }}">

                <button type="submit" class="btn goldfish_green_button w-100 mt-2" style="padding: 0;">{{ __('Search') }}</button>
            </div>
        </form>
    </div>
</div>
