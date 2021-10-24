@extends('layouts.base')
@section('content')
@section('title', 'Banned')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="alert alert-danger" role="alert">
        <h2>You have been banned!</h2>
        <div><b>Ban Reason:</b> {{$ban->ban_reason}}</div>
        <div><b>Type:</b> {{$ban->type}}
        <div class="countdown" data-datetime="{{$ban->ban_expire}}"><b>Ban Expiry:</b>
          <span class="days">0</span> days
          <span class="hours">0</span> hours
          <span class="minutes">0</span> minutes
          <span class="seconds">0</span> seconds
        </div>
      </div>
      <script>
(function()
{
	function updateCountdown()
	{
		$('.countdown').each(function()
		{
			var timestamp = parseInt(jQuery(this).attr('data-datetime')) * 1000;
			var target = new Date();
			var now = new Date();

			target.setTime(timestamp);
			var totalMilliSeconds = target.getTime() - now.getTime();

			if (totalMilliSeconds < 0) return;

			var totalSeconds = parseInt(totalMilliSeconds / 1000);
			var seconds = totalSeconds % 60;

			var totalMinutes = parseInt(totalSeconds / 60);
			var minutes = totalMinutes % 60;

			var totalHours = parseInt(totalMinutes / 60);
			var hours = totalHours % 24;

			var totalDays = parseInt(totalHours / 24);
			var days = totalDays;

			$(this).find('.days').text(days);
			$(this).find('.hours').text(hours);
			$(this).find('.minutes').text(minutes);
			$(this).find('.seconds').text(seconds);
		});

		window.setTimeout(updateCountdown, 1000);
	}
	updateCountdown();
})();
</script>
    </div>
  </div>
</div>
@endsection
