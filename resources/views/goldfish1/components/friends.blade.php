<div class="box blue">
    <div class="heading">My Online Friends</div>
    <div class="content">
        @forelse($fron as $row)
        <span class="friend"><a href="{{ route('profile.show', [$row->habbo->username]) }}">{{$row->habbo->username}}</a></span>
        @empty
        <span class="text-center full">You have no friends online</span>
        @endforelse
        @if($fron->count() >= 5)
        <span class="text-center full">
        And many others!
        </span>
        @endif
    </div>
</div>
