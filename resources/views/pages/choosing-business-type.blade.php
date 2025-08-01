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
                @include('forms.basic-info', ['form' => $form])
            </div>
            <div class="tab-pane fade" id="income" role="tabpanel" aria-labelledby="income-tab">
                @include('tabs.income', ['form' => $form])
            </div>
            <div class="tab-pane fade" id="deduction" role="tabpanel" aria-labelledby="deduction-tab">
               @include('tabs.deduction', ['form' => $form])
            </div>

            <div class="tab-pane fade" id="other-details" role="tabpanel" aria-labelledby="other-details-tab">
                @include('tabs.other-details', ['form' => $form])
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

        <div class="col-12 text-center mt-4">
            <form id="saveForm" method="POST" action="{{ route('choosing-business-form.save') }}">
                @csrf
                <input type="hidden" name="tab" id="currentTab" value="basic-info">
                <input type="hidden" name="form_data" id="formData">

                <button type="submit" class="btn btn-secondary">Save</button>
            </form>
        </div>


    </div>
</div>

<script>
    document.getElementById('saveForm').addEventListener('submit', function (e) {
        const activeTab = document.querySelector('.tab-pane.active');
        const tabId = activeTab.id;
        document.getElementById('currentTab').value = tabId;

        const inputs = activeTab.querySelectorAll('input, select, textarea');
        const data = {};

        inputs.forEach(input => {
            if (input.type === 'radio') {
                if (input.checked) {
                    data[input.name] = input.value;
                }
            } else {
                data[input.name] = input.value;
            }
        });

        document.getElementById('formData').value = JSON.stringify(data);
    });
</script>
@endsection