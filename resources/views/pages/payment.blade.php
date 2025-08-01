@extends('layouts.app')

@section('content')
<div class="choosing-business-type">
    <div class="container">
        <a href="{{ route('choosing-business-type') }}" class="back-home">
            <img src="{{ asset('img/icons/back.png') }}" alt="back">
            <p>Back</p>
        </a>
        <div class="col">
            <h2 class="paymant_title">Payment Method</h2>
            <p class="paymant_description">
                Now let’s find some tax deductions to help improve your refund.
            </p>
        </div>
        <form action="" id="paymant_method">
            <div class="row">
                <div class="col-md-6 mb-3">
                <div class="paymant_method">
                        <h3>Pay by Card</h3>
                        <img src="{{ asset('img/icons/hr.png') }}"  class="hr">
                        <div class="cpl-12 text-center">
                            <img src="{{ asset('img/card.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <div class="paymant_method">
                        <h3>Pay with PayPal</h3>
                        <img src="{{ asset('img/icons/hr.png') }}"  class="hr">
                        <div class="cpl-12 text-center">
                            <img src="{{ asset('img/pay-pal.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="payment_details">
                <div class="info">
                    <p>
                        <span>$100.00</span>
                        Amount Due
                    </p>
                </div>
                <div class="form">
                    <h3>Your Credit Card Payment Details</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="cardholder_first_name" class="form-control border-dark" placeholder="Cardholder Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="cardholder_last_name" class="form-control border-dark" placeholder="Cardholder Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="expiry_date" class="form-control border-dark" placeholder="Expiry Date - mm/yy">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="cvv" class="form-control border-dark" placeholder="CVV">
                        </div>
                    </div>
                </div>
            </div>
            <div class="paymant_agree">
                <input class="" type="checkbox" value="" id="agree">
                <label class="" for="agree">
                    I agree to the terms of the Tax Easy Accountants client agreement and for Tax Easy to receive ATO correspondence for me. The information I have provided is true and correct.
                </label>
            </div>
            <div class="col text-center mt-5">
                <button class="btn navbar_btn">Click to Sign Your Tax Return</button>
            </div>
        </form>
    </div>
</div>
@endsection