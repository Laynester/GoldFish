@props(['name', 'url', 'isActive',])

<li class="child">
    <a href="{{ $url }}" class="{{ $isActive ? 'selected' : '' }}">
        {{ $name }}
    </a>
</li>