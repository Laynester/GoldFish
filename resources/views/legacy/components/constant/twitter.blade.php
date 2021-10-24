@if(CMSHelper::settings('twitter_handle') != '')
<div class="legacy-box blue">
  <div class="heading">Twitter</div>
  <div class="content">
    <a class="twitter-timeline" data-chrome="noheader nofooter noborders transparent" data-height="303"href="https://twitter.com/{{CMSHelper::settings('twitter_handle')}}?ref_src=twsrc%5Etfw"></a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
  </div>
</div>
@endif
