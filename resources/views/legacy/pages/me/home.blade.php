@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<body class="profiles">
@if($personal)
<div class="col-sm-12">
  <div class="myPage">
    <div class="row">
      <div class="col-sm-7">
        @if($edit)
        <a onclick="openStore()">Inventory</a>
        <a onclick="openStore('store')">Shop</a>
        @else
        <button onclick="window.location.href='/home/{{Auth()->User()->username}}/edit'" class="btn">Edit</button>
        @endif
      </div>
      <div class="col-sm-5">
        @if($edit)
        <a href="/home/{{Auth()->User()->username}}" class="btn red right">Cancel editing</a>
        <button id="save" class="btn green right">Save changes</button>
        @endif
      </div>
    </div>
  </div>
</div>
@if($edit)
<script src="{{ asset('legacy/js/homes.js') }}"></script>
<script>
 var username = "{{Auth()->User()->username}}",
     originalBackground = "{{$background->name}}";
</script>
@endif
@endif
<div class="containment" id="containment-wrapper" style="background-image: url(/images/profile_backgrounds/{{$background->name}});">
  <div class="row homepages">
    <div class="col-md-6">
      @foreach($widgets as $row)
        @component('components.homes.widget')
          @slot('name')
            {{$row->name}}
          @endslot
          @slot('id')
            {{$row->id}}
          @endslot
          @slot('skin')
            {{$row->skin}}
          @endslot
          @slot('x')
          {{$row->x}}
          @endslot
          @slot('y')
          {{$row->y}}
          @endslot
          @slot('z')
          {{$row->z}}
          @endslot
          @slot('visible')
          {{$row->visible}}
          @endslot
          @slot('data')
          {{$row->data}}
          @endslot
          @slot('type')
          {{$row->type}}
          @endslot
          @slot('title')
            @if($row->name == 'myhabbo')
              My Profile
            @endif
            @if($row->name == 'rooms')
              My Rooms
            @endif
            @if($row->name == 'mybadges')
              My Badges
            @endif
            @if($row->name == 'friends')
            My Friends
            @endif
            @if($row->name == 'groups')
            My Groups
            @endif
          @endslot
          @slot('body')
            @if($row->name == 'myhabbo')
              @include('components.homes.myhabbo')
            @endif
            @if($row->name == 'rooms')
              @include('components.homes.rooms')
            @endif
            @if($row->name == 'mybadges')
              @include('components.homes.badges')
            @endif
            @if($row->name == 'friends')
              @include('components.homes.friends')
            @endif
            @if($row->name == 'groups')
              @include('components.homes.groups')
            @endif
            @if($row->name == 'photo')
              @include('components.homes.photo')
            @endif
          @endslot
          @slot('edit')
          @if($edit == true)
          true
          @else 
          false
          @endif
          @endslot
        @endcomponent
      @endforeach
      @foreach($stickers as $row)
      <div id="{{$row->id}}" data-z="{{$row->z}}" data-left="{{$row->x}}" data-top="{{$row->y}}" class="sticker @if($edit == 'true') draggable @endif" style="z-index:{{$row->z}};top:{{$row->y}}px;left:{{$row->x}}px;">
        @if($edit == 'true') <img onclick="showMenu(this)" data-id="{{$row->id}}" class="icon-edit" src="/legacy/images/icon_edit.gif">@endif
        <div class="edit-menu" id="{{$row->id}}-menu">
          <b>Settings</b>
          <button class="deleteElement" data-id="{{$row->id}}" data-type="s" onclick="deleteElement(this)">Delete</button>
        </div>
        <img src="/images/homestickers/{{$row->name}}.gif">
      </div>
      @endforeach
      @foreach($notes as $row)
        @component('components.homes.widget')
          @slot('name')
            {{$row->name}}
          @endslot
          @slot('id')
            {{$row->id}}
          @endslot
          @slot('skin')
            {{$row->skin}}
          @endslot
          @slot('x')
          {{$row->x}}
          @endslot
          @slot('y')
          {{$row->y}}
          @endslot
          @slot('z')
          {{$row->z}}
          @endslot
          @slot('visible')
          {{$row->visible}}
          @endslot
          @slot('data')
          {{$row->data}}
          @endslot
          @slot('body')<span>{!!CMSHelper::bbCode(CMSHelper::stripScript($row->data))!!}</span>@endslot
          @slot('edit')
          @if($edit == true)
          true
          @else 
          false
          @endif
          @endslot
          @slot('title')
          @endslot
          @slot('type')
          {{$row->type}}
          @endslot
        @endcomponent
      @endforeach
    </div>
  </div>
</div>
@endsection
@section('css')
<link href="{{ asset('legacy/css/homes.css') }}?{{time()}}" rel="stylesheet">
@endsection
