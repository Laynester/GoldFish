@extends('layouts.hk')
@section('content')
@section('title', 'Editing')
<div class="row">
  <div class="col-md-4">
    @include('modules.navigation')
  </div>
  <div class="col-md-8">
    @include('modules.site.newsedit')
  </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="https://unpkg.com/tinymce-emoji"></script>
<script type="text/javascript">
function changeTS(image) {
  $('#topstory').css("background-image", "url('/assets/images/news/"+image+"')");
}
tinymce.init({
selector: "#editor1",
height: 400,
resize: false,
codesample_dialog_width: 600,
codesample_dialog_height: 425,
plugins: [
  "a11ychecker autosave advlist link lists charmap preview anchor pagebreak",
  "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime",
  "table directionality  paste textcolor colorpicker tinymceEmoji "
],
toolbar: "undo redo | fontselect fontsizeselect | bold italic | forecolor backcolor tinymceEmoji | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link table | preview ",
protect: [
  /\<\/?(if|endif)\>/g,
  /\<xsl\:[^>]+\>/g,
  /<\?php.*?\?>/g
],
allow_unsafe_link_target: false,
emoji_size: 64,
emoji_add_space: false,
emoji_show_groups: true,
emoji_show_subgroups: false,
emoji_show_tab_icons: true,
image_title: true,
automatic_uploads: true,
external_plugins: {"nanospell": "/admin/js/tinymce/plugins/nanospell/plugin.js"},
nanospell_server: "php",
});</script>
@endsection
