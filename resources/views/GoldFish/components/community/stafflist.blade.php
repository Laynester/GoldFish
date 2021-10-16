@foreach($ranks as $rank)
    <div class="box red">
        <div class="heading">{{$rank->rank_name}}</div>
        @forelse($employees->where('rank', '=', $rank->id) as $staff)
            <a href="{{ route('profile.show', $staff->username) }}">
                <div class="staff {{ $staff->online == '1' ? 'online' : 'offline' }}">
                    <img class="avatar"
                         src="{{ CMSHelper::settings('habbo_imager') }}{{ $staff->look }}&headonly=1&head_direction=3"
                         alt="{{ $staff->username }}"/>

                    <div class="left staff_info">
                        <div style="font-weight: bold;">
                            {{ $staff->username }}
                            <span class="status"></span>
                        </div>

                        <i>{{ $staff->motto }}</i>
                    </div>

                    <div class="right">
                        <img src="{{ CMSHelper::settings('c_images') }}album1584/{{ $rank->badge }}.gif" alt="{{ $rank->badge }}">
                    </div>
                </div>
            </a>
        @empty
            <p class="text-center">There is currently no staff at this position</p>
        @endforelse
    </div>
@endforeach
