<div class="legacy-box">
    <div class="heading">Search</div>
    <div class="content">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>
        @endif
        <form action="{{ route('me.search') }}" method="post">
            <div class="form-group">
                @csrf
                <input type="text" name="search" placeholder="Search for a {{CMSHelper::settings('hotelname')}}">
            </div>
        </form>
    </div>
</div>
