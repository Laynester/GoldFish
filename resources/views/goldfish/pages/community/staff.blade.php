@extends('layouts.base')

@section('title', 'Staff')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @include('components.community.stafflist')
            </div>

            <div class="col-lg-3">
                <div class="box black">
                    <div class="heading">About</div>
                    <div class="content">
                        <small>
                            <p>The {{ CMSHelper::settings('hotelname') }} staff team is one big happy family, each staff
                                member has a different role and duties to fulfill.</p>
                            <p>Most of our team usually consists of players that have been
                                around {{ CMSHelper::settings('hotelname') }} for quite a while, but this doesn't mean
                                we only recruit old & known players, we recruit those who shine out to us!</p>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
