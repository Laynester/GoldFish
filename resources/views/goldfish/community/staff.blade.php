@extends('layouts.base')

@section('title', 'Staff')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <x-goldfish.community.staff-card :ranks="$ranks" :employees="$employees"/>
            </div>

            <div class="col-lg-3">
                <div class="box black">
                    <div class="heading">{{ __('$employees') }}</div>
                    <div class="content">
                        <small>
                            <p>
                                {{ __('The :hotelname staff team is one big happy family, each staff member has a different role and duties to fulfill.', ['hotelname' => CMSHelper::settings('hotelname')]) }}
                            </p>
                            <p>
                                {{ __('Most of our team usually consists of players that have been around :hotelname for quite a while, but this does not mean we only recruit old & known players, we recruit those who shine out to us!', ['hotelname' => CMSHelper::settings('hotelname')]) }}
                            </p>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
