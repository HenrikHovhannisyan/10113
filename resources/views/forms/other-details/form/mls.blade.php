<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Medicare Levy Surcharge (MLS) - Compulsory Question</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border mb-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <p class="choosing-business-type-text">
                    For the whole period from 1 July 2024 to 30 June 2025, did you and all your dependants (including your spouse if you had one) have private hospital cover?
                </p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="private_hospital_cover" id="privateHospitalYes" value="yes">
                    <label class="form-check-label custom-label" for="privateHospitalYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="private_hospital_cover" id="privateHospitalNo" value="no">
                    <label class="form-check-label custom-label" for="privateHospitalNo">No</label>
                </div>
            </div>
        </div>

        <div id="step2" class="row mb-3 d-none">
            <div class="col-md-6">
                <p class="choosing-business-type-text">
                    Was your income below $97,000.00 OR your family income below $194,000.00 (plus $1,500 per child excluding the first)?
                </p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="low_income" id="lowIncomeYes" value="yes">
                    <label class="form-check-label custom-label" for="lowIncomeYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="low_income" id="lowIncomeNo" value="no">
                    <label class="form-check-label custom-label" for="lowIncomeNo">No</label>
                </div>
            </div>
        </div>

        <div id="step3" class="row mb-3 d-none">
            <div class="col-md-6">
                <p class="choosing-business-type-text">
                    Did you and your dependants have private hospital cover for part of the year?
                </p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="partial_cover" id="partialCoverYes" value="yes">
                    <label class="form-check-label custom-label" for="partialCoverYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="partial_cover" id="partialCoverNo" value="no">
                    <label class="form-check-label custom-label" for="partialCoverNo">No</label>
                </div>
            </div>
        </div>

        <div id="notLiableDays" class="row mb-3 d-none">
            <div class="col-md-6">
                <label for="nonLiableDays" class="form-label">Number of days not liable for surcharge</label>
                <input type="number" class="form-control border-dark" id="nonLiableDays" name="non_liable_days" min="0" value="0">
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const coverRadios = document.getElementsByName("private_hospital_cover");
        const incomeRadios = document.getElementsByName("low_income");
        const partialRadios = document.getElementsByName("partial_cover");

        const step2 = document.getElementById("step2");
        const step3 = document.getElementById("step3");
        const notLiableDays = document.getElementById("notLiableDays");

        coverRadios.forEach(radio => {
            radio.addEventListener("change", () => {
                if (radio.value === "no") {
                    step2.classList.remove("d-none");
                } else {
                    step2.classList.add("d-none");
                    step3.classList.add("d-none");
                    notLiableDays.classList.add("d-none");
                }
            });
        });

        incomeRadios.forEach(radio => {
            radio.addEventListener("change", () => {
                if (radio.value === "no") {
                    step3.classList.remove("d-none");
                } else {
                    step3.classList.add("d-none");
                    notLiableDays.classList.add("d-none");
                }
            });
        });

        partialRadios.forEach(radio => {
            radio.addEventListener("change", () => {
                if (radio.value === "yes") {
                    notLiableDays.classList.remove("d-none");
                } else {
                    notLiableDays.classList.add("d-none");
                }
            });
        });
    });
</script>
