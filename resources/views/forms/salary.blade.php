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
            <div id="employerContainer">
                <section class="employer-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Employer’s ABN</p>
                            <input type="number" name="employer_abn" class="form-control border-dark" placeholder="33 051 775 556">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Tax Withheld</p>
                            <input type="number" name="total_tax_withheld" class="form-control border-dark" placeholder="00.00$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Gross Payments</p>
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
                                <input
                                    class="form-check-input custom-radio income-yes"
                                    type="radio"
                                    name="income_items[0]"
                                    id="incomeYes_0"
                                    value="yes"
                                >
                                <label class="form-check-label custom-label" for="incomeYes_0">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input custom-radio income-no"
                                    type="radio"
                                    name="income_items[0]"
                                    id="incomeNo_0"
                                    value="no"
                                >
                                <label class="form-check-label custom-label" for="incomeNo_0">No</label>
                            </div>
                        </div>
                        <div class="row mb-3 income-details" style="display: none;">
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input class="form-check-input mt-0" type="checkbox" name="allowances[]">
                                    <label class="form-check-label">Allowances</label>
                                </div>
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input class="form-check-input mt-0" type="checkbox" name="fringe_benefits[]">
                                    <label class="form-check-label">Fringe benefits</label>
                                </div>
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input class="form-check-input mt-0" type="checkbox" name="reportable_super[]">
                                    <label class="form-check-label">Reportable super & lump sum payments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add_employer">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Add another employer
                    </button>
                    <button type="button" class="btn btn_delete_employer">
                        Delete employer
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Was this your only salary or income during the past year?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="only_income" id="onlyIncomeYes" value="yes">
                        <label class="form-check-label custom-label" for="onlyIncomeYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="only_income" id="onlyIncomeNo" value="no">
                        <label class="form-check-label custom-label" for="onlyIncomeNo">No</label>
                    </div>
                    <input type="text" name="only_income_details" class="form-control border-dark mt-2" id="onlyIncomeDetails" placeholder="Add more details here about any other income" style="display: none;">
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", () => {

    function initIncomeRadio(section) {
        const yesRadio = section.querySelector(".income-yes");
        const noRadio = section.querySelector(".income-no");
        const detailsBlock = section.querySelector(".income-details");

        if (!yesRadio || !noRadio || !detailsBlock) return;

        const toggleDetails = () => {
            detailsBlock.style.display = yesRadio.checked ? "block" : "none";
        };

        yesRadio.addEventListener("change", toggleDetails);
        noRadio.addEventListener("change", toggleDetails);

        toggleDetails(); 
    }

    const employerContainer = document.getElementById("employerContainer");

    function initIncomeRadio(section) {
        const yesRadio = section.querySelector(".income-yes");
        const noRadio = section.querySelector(".income-no");
        const detailsBlock = section.querySelector(".income-details");

        if (!yesRadio || !noRadio || !detailsBlock) return;

        const toggleDetails = () => {
            detailsBlock.style.display = yesRadio.checked ? "block" : "none";
        };

        yesRadio.addEventListener("change", toggleDetails);
        noRadio.addEventListener("change", toggleDetails);

        toggleDetails();
    }

    function updateIncomeRadioIds(section, index) {
        const yesRadio = section.querySelector(".income-yes");
        const noRadio = section.querySelector(".income-no");
        const yesLabel = section.querySelector("label[for^='incomeYes']");
        const noLabel = section.querySelector("label[for^='incomeNo']");

        if (!yesRadio || !noRadio) return;

        yesRadio.id = "incomeYes_" + index;
        yesRadio.name = "income_items[" + index + "]";
        noRadio.id = "incomeNo_" + index;
        noRadio.name = "income_items[" + index + "]";

        if (yesLabel) yesLabel.setAttribute("for", yesRadio.id);
        if (noLabel) noLabel.setAttribute("for", noRadio.id);
    }

    function clearInputs(section) {
        section.querySelectorAll("input").forEach(input => {
            if (input.type === "radio" || input.type === "checkbox") {
                input.checked = false;
            } else {
                input.value = "";
            }
        });
    }

    function initAllEmployerBlocks() {
        const blocks = employerContainer.querySelectorAll(".employer-block");
        blocks.forEach((block, idx) => {
            block.dataset.index = idx;
            updateIncomeRadioIds(block, idx);
            clearInputs(block);
            initIncomeRadio(block);
        });
    }

    initAllEmployerBlocks();

    document.querySelector(".btn_add_employer").addEventListener("click", () => {
        const blocks = employerContainer.querySelectorAll(".employer-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);

        employerContainer.appendChild(newBlock);
        initAllEmployerBlocks();
    });

    document.querySelector(".btn_delete_employer").addEventListener("click", () => {
        const blocks = employerContainer.querySelectorAll(".employer-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
        initAllEmployerBlocks();
    });

    const onlyIncomeYes = document.getElementById("onlyIncomeYes");
    const onlyIncomeNo = document.getElementById("onlyIncomeNo");
    const onlyIncomeDetails = document.getElementById("onlyIncomeDetails");

    function toggleOnlyIncomeDetails() {
        onlyIncomeDetails.style.display = onlyIncomeNo.checked ? "block" : "none";
    }

    onlyIncomeYes.addEventListener("change", toggleOnlyIncomeDetails);
    onlyIncomeNo.addEventListener("change", toggleOnlyIncomeDetails);
    toggleOnlyIncomeDetails();
});
</script>
