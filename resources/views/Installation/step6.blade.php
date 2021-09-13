@extends('Installation.layouts.installation')

@section('step', '6')

@section('content')
<div class="col-lg-12">
  <div class="box green">
    <p>You made it! GoldFish installed successfully</p>
    <p>Remember you can change these settings through the database, or your hotel housekeeping.</p>

      <form method="post" action="{{ route('installation.step.update', 6) }}">
          @csrf

          <button class="green-step-two">
              Go to my new site!
          </button>
      </form>
  </div>
{{--  <span class="controls">--}}
{{--    <form method="post">--}}
{{--      <button class="red" type="submit">Start Over</button>--}}
{{--      @csrf--}}
{{--    </form>--}}
{{--  </span>--}}
</div>
@endsection
