@extends('layouts.hk')
@section('content')
@section('title', 'News')
<div class="row">
  <div class="col-md-4">
    @include('housekeeping.modules.navigation')
  </div>
  <div class="col-md-8">
    @include('housekeeping.modules.site.news')
  </div>
</div>
@endsection
@section('javascript')
<script>
function changeTS(image) {
  $('#topstory').css("background-image", "url('/images/news/"+image+"')");
}
</script>
@endsection
