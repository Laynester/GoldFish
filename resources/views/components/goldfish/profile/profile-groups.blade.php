@props(['user', 'groups'])

<div class="box blue profile groups">
    <div class="heading">{{ __(':username groups', ['username' => $user->username]) }}</div>
    @forelse($groups as $group)
        <figure class="group" style="background-image:url({{CMSHelper::settings('group_badges')}}{{$group->guild->badge}}.png);">{{ $group->guild->name }}</figure>
    @empty
        <p class="text-center">{{ __(':username currently has no groups.', ['username' => $user->username]) }}</p>
    @endforelse
</div>
