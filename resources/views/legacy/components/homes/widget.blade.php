<div
id="{{$id}}"
class="widget_{{$skin}} home-widget {{$name}}@if($edit == 'true') draggable @endif"
style="left:{{$x}}px; top:{{$y}}px;z-index:{{$z}}; @if($visible == '0') display:none; @endif"
data-top="{{$y}}"
data-left="{{$x}}"
data-z="{{$z}}"
data-skin="{{$skin}}"
data-data="{{$data}}">
    <div class="heading">
        <span>{{$title}}</span>
    </div>
    @if($edit == 'true')
    <img id="{{$id}}-edit" onclick="showMenu(this)" data-id="{{$id}}" class="icon-edit" src="/assets/legacy/images/icon_edit.gif">
    <div class="edit-menu" id="{{$id}}-menu">
        <b>Settings</b>
        @if($name != 'photo')
        <select class="selectSkin" data-id="{{$id}}" onkeypress="changeSkin(this,this.value)" onchange="changeSkin(this,this.value)">
            <option disabled selected>Choose</option>
            <option value="default_skin">Default</option>
            <option value="bubble_skin">Speech bubble</option>
            <option value="metal_skin">Metal</option>
            <option value="notepad_skin">Notepad</option>
            <option value="note_skin">Sticky Note</option>
            <option value="golden_skin">Golden</option>
            <option value="hcm_skin">HC Machine</option>
        </select>
        @else
        <select class="selectSkin" data-id="{{$id}}" onkeypress="changePhoto(this,this.value)" onchange="changePhoto(this,this.value)">
            <option disabled selected>Choose</option>
            @foreach(\App\Models\CMS\CameraWeb::where('user_id', auth()->user()->id)->inRandomOrder()->get() as $photo)
            <option value="{{$photo->url}}">{{$photo->room->name}} - {{date('d/m/y h:i', $photo->timestamp)}}</option>
            @endforeach
        </select>
        @endif
        @if($name != 'myhabbo')
        <button class="deleteElement" data-type="{{$type}}" data-id="{{$id}}" onclick="deleteElement(this)">Delete</button>
        @endif
    </div>
    @endif
    <div class="body">
        {{$body}}
    </div>
</div>