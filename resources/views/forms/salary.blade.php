<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Salary or Wages</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <div class="row mb-3">
        <p class="choosing-business-type-text">
            Enter all your income you received from your employer/s below
        </p>
        <div class="grin_box_border">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">
                        Employer’s ABN
                    </p>
                    <input type="number" name="employer_abn" class="form-control border-dark" placeholder="33 051 775 556">
                </div>
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">
                        Total Tax Withheld
                    </p>
                    <input type="number" name="total_tax_withheld" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">
                        Gross Payments
                    </p>
                    <input type="number" name="gross_payments" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">
                        Are there any more items on your Income Statement? <br>
                        (Includes allowances, fringe benefits, reportable super & lump sum payments)
                    </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="income_items" id="incomeYes" value="yes">
                        <label class="form-check-label custom-label" for="incomeYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="income_items" id="incomeNo" value="no">
                        <label class="form-check-label custom-label" for="incomeNo">No</label>
                    </div>
                </div>

                <!-- Блок, который появляется только при выборе "Yes" -->
                <div class="row mb-3" id="incomeDetailsBlock" style="display: none;">
                    <div class="col-md-12">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input mt-0" type="checkbox" id="allowances" name="allowances">
                            <label class="form-check-label" for="allowances">Allowances</label>
                        </div>
                        <div class="form-check form-switch mt-0 mb-2">
                            <input class="form-check-input" type="checkbox" id="fringeBenefits" name="fringe_benefits">
                            <label class="form-check-label" for="fringeBenefits">Fringe benefits</label>
                        </div>
                        <div class="form-check form-switch mt-0 mb-2">
                            <input class="form-check-input" type="checkbox" id="reportableSuper" name="reportable_super">
                            <label class="form-check-label" for="reportableSuper">Reportable super & lump sum payments</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const incomeYes = document.getElementById("incomeYes");
    const incomeNo = document.getElementById("incomeNo");
    const detailsBlock = document.getElementById("incomeDetailsBlock");

    incomeYes.addEventListener("change", function () {
        if (this.checked) {
            detailsBlock.style.display = "block";
        }
    });

    incomeNo.addEventListener("change", function () {
        if (this.checked) {
            detailsBlock.style.display = "none";
        }
    });
});
</script>


