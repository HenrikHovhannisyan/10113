<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title">My Deduction Finder</h2>
    <p class="choosing-business-type-text text-center mb-5">
        Now let’s find some tax deductions to help improve your refund.
    </p>
    <h4 class="form_title">These are common tax deductions for a Manager - retail store.</h4>
    <div class="select_deduction_container mt-0">
        @php
            $deductions = [
                'car_expenses' => 'Car expenses + parking + tolls',
                'travel_expenses' => 'Travel Expenses',
                'mobile_phone' => 'Mobile Phone',
                'internet_access' => 'Internet Access',
                'computer' => 'Computer / Laptop',
                'gifts' => 'Gifts / Donations',
                'home_office' => 'Home Office Expenses',
                'books' => 'Books & Other Work-Related Expenses',
                'tax_affairs' => 'Cost of Tax Affairs',
                'uniforms' => 'Uniforms',
                'education' => 'Education Expenses',
                'tools' => 'Tools and Equipment',
                'superannuation' => 'Superannuation Contributions',
                'office_occupancy' => 'Home Office Occupancy',
                'union_fees' => 'Union Fees',
                'sun_protection' => 'Sun Protection',
                'low_value_pool' => 'Low Value Pool Deduction',
                'interest_deduction' => 'Interest Deductions',
                'dividend_deduction' => 'Dividend Deductions',
                'upp' => 'Deductible Amount Of UPP',
                'project_pool' => 'Deduction For Project Pool',
                'investment_scheme' => 'Investment Scheme Deduction',
                'other' => 'Other Deductions',
            ];
        @endphp

        @foreach(array_slice($deductions, 0, 9) as $key => $label)
            <div class="deduction-item" data-index="{{ $loop->index }}">
                <div class="deduction-label">
                    <p>{{ $label }}</p>
                    <img src="{{ asset('img/icons/hr.png') }}" class="img-fluid" alt="hr">
                </div>
                <div class="deduction-icon">
                    <img src="{{ asset('img/icons/deduction/' . $key . '.png') }}" class="img-fluid" alt="{{ $key }}">
                </div>
            </div>
        @endforeach
    </div>

    <h4 class="form_title mt-4">Is there anything else you can claim?</h4>
    <div class="select_deduction_container select_deduction_container1 mt-0">
        @foreach(array_slice($deductions, 9) as $key => $label)
            <div class="deduction-item {{ $loop->index > 8 ? 'hidden' : '' }}" data-index="{{ $loop->index + 9 }}">
                <div class="deduction-label">
                    <p>{{ $label }}</p>
                    <img src="{{ asset('img/icons/hr.png') }}" class="img-fluid" alt="hr">
                </div>
                <div class="deduction-icon">
                    <img src="{{ asset('img/icons/deduction/' . $key . '.png') }}" class="img-fluid" alt="{{ $key }}">
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">
        <button class="btn toggle-btn" id="toggleDeductionBtn">Show More</button>
    </div>
</section>

<section class="choosing-business-type_section">
    <h2 class="choosing-business-type-title" id="deduction-forms_title">Let’s add the details</h2>
    <div class="deduction-form-container">
        @foreach(array_keys($deductions) as $i => $key)
            <div class="d-none" id="form-deduction-{{ $i }}">
                @include('forms.deduction.' . $key)
            </div>
        @endforeach
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".deduction-item");

    items.forEach((item) => {
        item.addEventListener("click", () => {
            const index = item.getAttribute("data-index");
            const formToShow = document.getElementById(`form-deduction-${index}`);

            if (!formToShow) return;

            if (formToShow.classList.contains("d-none")) {
                formToShow.classList.remove("d-none");
                item.classList.add("active");

                const target = document.getElementById("deduction-forms_title");
                if (target) {
                    target.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            }
        });
    });
});
</script>
