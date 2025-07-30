<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title">My Deduction Finder</h2>
    <p class="choosing-business-type-text text-center mb-5">
        Now let’s find some tax deductions to help improve your refund.
    </p>
    <h4 class="form_title">These are common tax deductions for a Manager - retail store.</h4>
    <div class="select_deduction_container select_deduction_container2 mt-0">
    @php
        $items = [
            'spouse_details' => 'Spouse Details',
            'private_health_insurance' => 'Private Health Insurance',
            'zone_overseas_forces_offset' => 'Zone / Overseas Forces Offset',
            'seniors_offset' => 'Seniors Offset',
            'medicare_reduction_exemption' => 'Medicare Reduction / Exemption',
            'part_year_tax_free_threshold' => 'Part-year Tax-free Threshold',
            'medical_expenses_offset' => 'Medical Expenses Offset',
            'under_18' => 'Under 18',
            'working_holiday_maker_net_income' => 'Working Holiday Maker Net Income',
            'superannuation_income_stream_offset' => 'Superannuation Income Stream Offset',
            'superannuation_contributions_spouse' => 'Superannuation Contributions on Behalf of Your Spouse',
            'tax_losses_earlier_income_years' => 'Tax Losses of Earlier Income Years',
            'dependent_invalid_and_carer' => 'Dependent (invalid and carer)',
            'superannuation_co_contribution' => 'Superannuation Co-Contribution',
            'other_tax_offsets_refundable' => 'Other Tax Offsets (Refundable)',
        ];
    @endphp

    @foreach($items as $key => $label)
        <div class="other-details-item" data-index="{{ $loop->index }}">
            <div class="other-details-label">
                <p>{{ $label }}</p>
                <img src="{{ asset('img/icons/hr.png') }}" class="img-fluid" alt="hr">
            </div>
            <div class="other-details-icon">
                <img src="{{ asset('img/icons/other-details/' . $key . '.png') }}" class="img-fluid" alt="{{ $label }}">
            </div>
        </div>
    @endforeach
    </div>

    <div class="text-center">
        <button class="btn toggle-btn" id="toggleBtnOther">Show More</button>
    </div>
</section>

<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title" id="other-details-forms_title">Let’s add the details</h2>
    <div class="form-container">
        @include('forms.other-details.form.dependent_children')
        <div class="d-none" id="other-details-form-1">@include('forms.other-details.private_health_insurance')</div>
        <div class="d-none" id="other-details-form-2">@include('forms.other-details.zone_offset')</div>
        <div class="d-none" id="other-details-form-3">@include('forms.other-details.seniors_offset')</div>
        <div class="d-none" id="other-details-form-4">@include('forms.other-details.medicare_reduction')</div>
        <div class="d-none" id="other-details-form-6">@include('forms.other-details.medical_expenses')</div>
        <div class="d-none" id="other-details-form-9">@include('forms.other-details.super_income_stream')</div>
        <div class="d-none" id="other-details-form-10">@include('forms.other-details.super_contributions_spouse')</div>
        <div class="d-none" id="other-details-form-11">@include('forms.other-details.tax_losses_earlier')</div>
        <div class="d-none" id="other-details-form-12">@include('forms.other-details.dependent_invalid')</div>
        <div class="d-none" id="other-details-form-14">@include('forms.other-details.other_refundable_offsets')</div>
        @include('forms.other-details.form.mls')
        <div class="d-none" id="other-details-form-5">@include('forms.other-details.tax_free_threshold')</div>
        <div class="d-none" id="other-details-form-7">@include('forms.other-details.under_18')</div>
        <div class="d-none" id="other-details-form-8">@include('forms.other-details.working_holiday_income')</div>
        <div class="d-none" id="other-details-form-13">@include('forms.other-details.super_co_contribution')</div>
        @include('forms.other-details.form.income_tests')
        <div class="d-none" id="other-details-form-0">@include('forms.other-details.spouse_details')</div>
        @include('forms.other-details.form.attach')
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".other-details-item");

    items.forEach((item) => {
        item.addEventListener("click", () => {
            const index = item.getAttribute("data-index");

            const formToShow = document.getElementById(`other-details-form-${index}`);
            if (formToShow && formToShow.classList.contains("d-none")) {
                formToShow.classList.remove("d-none");
                item.classList.add("active");

                const target = document.getElementById("other-details-forms_title");
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            }
        });
    });
});
</script>

