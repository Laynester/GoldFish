@extends('layouts.master')
@section('title', 'Leaderboard')
@section('content')
<div class="row">
  <div class="col-lg-4">
    <x-legacy.community.leaderboard-card
            :title="__('Credits')"
            type="credits"
            fetch="credits"
            color="gold"
            :leaderboard="$credits"
    />
    <x-legacy.community.leaderboard-card
            :title="__('Respects Received')"
            type="respects"
            fetch="respects_received"
            color="blue"
            :leaderboard="$respects"
            :hasRelationship="true"
    />
  </div>

  <div class="col-lg-4">
    <x-legacy.community.leaderboard-card
            :title="__('Diamonds')"
            type="diamonds"
            fetch="amount"
            color="blue"
            :leaderboard="$diamonds"
            :hasRelationship="true"
    />
    <x-legacy.community.leaderboard-card
            :title="__('Achievement Score')"
            type="achievement"
            fetch="achievement_score"
            color="red"
            :leaderboard="$achievement"
            :hasRelationship="true"
    />
  </div>

  <div class="col-lg-4">
    <x-legacy.community.leaderboard-card
            :title="__('Duckets')"
            type="duckets"
            fetch="amount"
            color="pink"
            :leaderboard="$duckets"
            :hasRelationship="true"
    />
    <x-legacy.community.leaderboard-card
            :title="__('Online Time')"
            type="timeon"
            fetch="progress"
            color="orange"
            :leaderboard="$time"
            :hasRelationship="true"
    />
  </div>
</div>
@endsection
