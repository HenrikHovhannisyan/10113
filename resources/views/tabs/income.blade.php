<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title">My Income</h2>
    <p class="choosing-business-type-text text-center">
        Enter the personal information we need to verify your identity and begin your tax refund application.
    </p>
    <div class="select_deduction_container select_deduction_container2 mt-0">
        @php
            $incomeItems = [
                'salary' => 'Salary / Wages',
                'interest' => 'Interest',
                'dividends' => 'Dividends',
                'government_allowances' => 'Government Allowances',
                'government_pension' => 'Government Pension',
                'capital_gains' => 'Capital Gains or Losses',
                'managed_funds' => 'Managed Funds',
                'termination_payments' => 'Termination Payments',
                'rent' => 'Rent Received',
                'partnerships' => 'Partnerships and Trusts',
                'annuities' => 'Australian Annuities',
                'superannuation' => 'Superannuation Income Stream',
                'super_lump_sums' => 'Super Lump Sums',
                'ess' => 'Employee Share Schemes',
                'personal_services' => 'Personal Services Income',
                'business_income' => 'Income / Loss From Business',
                'business_losses' => 'Deferred Business Losses',
                'foreign_income' => 'Foreign Source Income',
                'other_income' => 'Other Income'
            ];
        @endphp

        @foreach($incomeItems as $key => $label)
            <div class="other-details-item {{ $loop->index > 5 ? 'hidden' : '' }}" data-index="{{ $loop->index }}">
                <div class="other-details-label">
                    <p>{{ $label }}</p>
                    <img src="{{ asset('img/icons/hr.png') }}" class="img-fluid" alt="hr">
                </div>
                <div class="other-details-icon">
                    <img src="{{ asset('img/icons/income/' . $key . '.png') }}" class="img-fluid" alt="{{ $label }}">
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <button class="btn toggle-btn" id="toggleBtnIncome">Show More</button>
    </div>
</section>

<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title" id="forms_title">Let’s add the details</h2>
    <div class="form-container">
        @foreach(array_keys($incomeItems) as $i => $key)
            <div class="d-none" id="form-{{ $i }}">@include('forms.income.' . $key)</div>
        @endforeach
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".other-details-item");

    items.forEach((item) => {
        item.addEventListener("click", () => {
            const index = item.getAttribute("data-index");
            const formToShow = document.getElementById(`form-${index}`);

            if (formToShow && formToShow.classList.contains("d-none")) {
                formToShow.classList.remove("d-none");
                item.classList.add("active");

                const target = document.getElementById("forms_title");
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            }
        });
    });

    const toggleBtn = document.getElementById("toggleBtnIncome");
    toggleBtn.addEventListener("click", function () {
        document.querySelectorAll(".other-details-item.hidden").forEach(el => el.classList.remove("hidden"));
        toggleBtn.classList.add("d-none");
    });
});
</script>
