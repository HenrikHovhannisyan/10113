@extends('layouts.app')

@section('content')
<div class="choosing-business-type">
    <div class="container">
        <a href="{{ route('home') }}" class="back-home">
            <img src="{{ asset('img/icons/home.png') }}" alt="home">
            <p>Back to Home</p>
        </a>

        <div class="custom-tabs" role="tablist" id="myTab">
            <div class="tab-item active" data-bs-toggle="tab" data-bs-target="#basic-info">BASIC INFO</div>
            <div class="tab-item" data-bs-toggle="tab" data-bs-target="#income">INCOME</div>
            <div class="tab-item" data-bs-toggle="tab" data-bs-target="#deduction">DEDUCTION</div>
            <div class="tab-item" data-bs-toggle="tab" data-bs-target="#other-details">OTHER</div>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="basic-info" role="tabpanel">
                @include('forms.edit.basic-info', ['basicInfo' => $basicInfo])
            </div>
            <div class="tab-pane fade" id="income" role="tabpanel">
                @include('tabs.income')
            </div>
            <div class="tab-pane fade" id="deduction" role="tabpanel">
                @include('tabs.deduction')
            </div>
            <div class="tab-pane fade" id="other-details" role="tabpanel">
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
