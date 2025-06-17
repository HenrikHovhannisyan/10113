@extends('layouts.app')

@section('content')
<section id="home_banner">
    <div class="container">
        <div class="col-md-6">
            <h1>Lodge Your Income Tax Return the Smart, Easy Way</h1>
            <p>Trusted by individuals and families across Australia. Secure. Simple. Fast.</p>
            <a href="#" class="navbar_btn">Start Your Income Tax Return Now</a>
        </div>
    </div>
</section>
<section id="home_info">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="home_info_box">
                    <p class="title">TPB</p>
                    <p>Registered</p>
                </div>
                <div class="home_info_box">
                    <img src="{{ asset('img/icons/secure.png') }}" alt="secure">
                    <img src="{{ asset('img/icons/hr.png') }}"  class="hr">
                    <h2>Secure & Private</h2>
                    <p>Your financial data is encrypted and handled by registered professionals.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home_info_box">
                    <img src="{{ asset('img/icons/fast.png') }}" alt="fast">
                    <img src="{{ asset('img/icons/hr.png') }}"  class="hr">
                    <h2>Fast Lodgement</h2>
                    <p>Complete your tax return in as little as 15 minutes.</p>
                </div>
                <div class="home_info_box">
                    <p class="title">1000+</p>
                    <p>Returns Lodged</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home_info_box">
                    <p class="title">Stripe</p>
                    <p>Secure Payments</p>
                </div>
                <div class="home_info_box">
                    <img src="{{ asset('img/icons/expert.png') }}" alt="expert">
                    <img src="{{ asset('img/icons/hr.png') }}"  class="hr">
                    <h2>Expert Help</h2>
                    <p>Need support? Our licensed tax agents are ready to help.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection