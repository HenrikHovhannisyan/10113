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
<section id="how_it_works">
    <h2 class="title">How It Works</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>STEP 1</h2>
                <img src="{{ asset('img/how_it_works/1.png') }}" class="img-fluid mb-3" alt="how_it_works">
                <h2>Upload or Enter Your Info</h2>
                <p>Provide only what’s necessary — securely and at your own pace.</p>
            </div>
            <div class="col-md-4">
                <h2>STEP 2</h2>
                <img src="{{ asset('img/how_it_works/2.png') }}" class="img-fluid mb-3" alt="how_it_works">
                <h2>Answer Simple Questions</h2>
                <p>We’ve broken down the ATO forms into an easy-to-follow questionnaire.</p>
            </div>
            <div class="col-md-4">
                <h2>STEP 3</h2>
                <img src="{{ asset('img/how_it_works/3.png') }}" class="img-fluid mb-3" alt="how_it_works">
                <h2>We Lodge Your Return</h2>
                <p>You sit back. We lodge and notify you once it's done.</p>
            </div>
        </div>
    </div>
</section>
@endsection