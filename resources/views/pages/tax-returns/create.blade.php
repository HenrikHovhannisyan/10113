@extends('layouts.app')

@section('content')
<div class="choosing-business-type">
    <div class="container">
        <a href="{{ route('home') }}" class="back-home">
            <img src="{{ asset('img/icons/home.png') }}" alt="home">
            <p>Back to Home</p>
        </a>

        <div class="custom-tabs" role="tablist" id="myTab">
            <div class="tab-item active" role="tab" tabindex="0" aria-selected="true" aria-controls="basic-info" data-bs-toggle="tab" data-bs-target="#basic-info">
                BASIC INFO
            </div>
            <div class="tab-item" role="tab" tabindex="0" aria-selected="false" aria-controls="income" data-bs-toggle="tab" data-bs-target="#income">
                INCOME
            </div>
            <div class="tab-item" role="tab" tabindex="0" aria-selected="false" aria-controls="deduction" data-bs-toggle="tab" data-bs-target="#deduction">
                Deduction
            </div>
            <div class="tab-item" role="tab" tabindex="0" aria-selected="false" aria-controls="other-details" data-bs-toggle="tab" data-bs-target="#other-details">
                Other
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                @include('forms.basic-info')
            </div>
            <div class="tab-pane fade" id="income" role="tabpanel" aria-labelledby="income-tab">
                @include('tabs.income')
            </div>
            <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
               @include('tabs.deduction')
            </div>

            <div class="tab-pane fade" id="other-details" role="tabpanel" aria-labelledby="other-details-tab">
                @include('tabs.other-details')
            </div>
        </div>

        <div class="tab-buttons mt-4 d-flex justify-content-center gap-4">
            <button class="btn back_btn" id="prevBtn" type="button">
                <img src="{{ asset('img/icons/back.png') }}" alt="Back">
                <p>Back</p>
            </button>
            <button class="btn navbar_btn" id="nextBtn" type="button">Next</button>
            <button class="btn navbar_btn d-none" id="confirmBtn" type="button">Confirm</button>
        </div>


    </div>
</div>
@endsection