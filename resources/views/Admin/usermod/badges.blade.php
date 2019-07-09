@extends('layouts.hk')
@section('content')
@section('title', 'Give a Badge')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.moderation.badges')
  </div>
</div>
@endsection
@section('javascript')
<script>
function readURL(input) {
  var url = input.value;
  var cimages = "{{CMSHelper::settings('c_images')}}album1584/";
  $('#badge').attr('src', cimages+url+'.gif');
}
</script>
@endsection
