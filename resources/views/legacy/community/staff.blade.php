@extends('layouts.master')
@section('title', 'Staff')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="photo-grid">
                <x-legacy.community.staff-card :employees="$employees" />
            </div>
        </div>
    </div>
@endsection
