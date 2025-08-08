<section>
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
                @php
                    $employerCount = max(count(old('employer_abn', [])), 
                                      isset($incomes) ? count($incomes->employer_abn ?? []) : 0, 
                                      1);
                @endphp
                
                @for($i = 0; $i < $employerCount; $i++)
                <section class="employer-block" data-index="{{ $i }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Employer’s ABN</p>
                            <input
                                type="number"
                                name="employer_abn[{{ $i }}]"
                                class="form-control border-dark"
                                placeholder="33 051 775 556"
                                value="{{ old("employer_abn.$i", $incomes->employer_abn[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Tax Withheld</p>
                            <input 
                                type="number" 
                                name="total_tax_withheld[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("total_tax_withheld.$i", $incomes->total_tax_withheld[$i] ?? '') }}"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Gross Payments</p>
                            <input 
                                type="number" 
                                name="gross_payments[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("gross_payments.$i", $incomes->gross_payments[$i] ?? '') }}"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">
                                Are there any more items on your Income Statement? <br>
                                (Includes allowances, fringe benefits, reportable super & lump sum payments)
                            </p>
                            @php
                                $incomeItemValue = old("income_items.$i", $incomes->income_items[$i] ?? '');
                            @endphp
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input custom-radio income-yes"
                                    type="radio"
                                    name="income_items[{{ $i }}]"
                                    id="incomeYes_{{ $i }}"
                                    value="yes"
                                    {{ $incomeItemValue === 'yes' ? 'checked' : '' }}
                                >
                                <label class="form-check-label custom-label" for="incomeYes_{{ $i }}">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input custom-radio income-no"
                                    type="radio"
                                    name="income_items[{{ $i }}]"
                                    id="incomeNo_{{ $i }}"
                                    value="no"
                                    {{ $incomeItemValue === 'no' ? 'checked' : '' }}
                                >
                                <label class="form-check-label custom-label" for="incomeNo_{{ $i }}">No</label>
                            </div>
                        </div>
                        <div class="row mb-3 income-details" 
                             style="display: {{ $incomeItemValue === 'yes' ? 'block' : 'none' }};">
                            <div class="col-md-6 mb-3">
                                @php
                                    $allowanceChecked = old("allowances.$i", $incomes->allowances[$i] ?? 'off') === 'on';
                                @endphp
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input type="hidden" name="allowances[{{ $i }}]" value="off">
                                    <input 
                                        class="form-check-input mt-0" 
                                        type="checkbox" 
                                        name="allowances[{{ $i }}]" 
                                        value="on"
                                        {{ $allowanceChecked ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label">Allowances</label>               
                                </div>
                                @php
                                    $fringeChecked = old("fringe_benefits.$i", $incomes->fringe_benefits[$i] ?? 'off') === 'on';
                                @endphp
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input type="hidden" name="fringe_benefits[{{ $i }}]" value="off">
                                    <input 
                                        class="form-check-input mt-0" 
                                        type="checkbox" 
                                        name="fringe_benefits[{{ $i }}]" 
                                        value="on"
                                        {{ $fringeChecked ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label">Fringe benefits</label>
                                </div>
                                @php
                                    $superChecked = old("reportable_super.$i", $incomes->reportable_super[$i] ?? 'off') === 'on';
                                @endphp
                                <div class="form-check form-switch d-flex align-items-center gap-3 mb-3">
                                    <input type="hidden" name="reportable_super[{{ $i }}]" value="off">
                                    <input 
                                        class="form-check-input mt-0" 
                                        type="checkbox" 
                                        name="reportable_super[{{ $i }}]" 
                                        value="on"
                                        {{ $superChecked ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label">Reportable super & lump sum payments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endfor
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add btn_add_employer">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Add another employer
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_employer">
                        Delete employer
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Was this your only salary or income during the past year?</p>
                    @php
                        $onlyIncomeValue = old('only_income', $incomes->only_income ?? '');
                        $showIncomeDetails = $onlyIncomeValue === 'no';
                    @endphp
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input custom-radio" 
                            type="radio" 
                            name="only_income" 
                            id="onlyIncomeYes" 
                            value="yes"
                            {{ $onlyIncomeValue === 'yes' ? 'checked' : '' }}
                        >
                        <label class="form-check-label custom-label" for="onlyIncomeYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input 
                            class="form-check-input custom-radio" 
                            type="radio" 
                            name="only_income" 
                            id="onlyIncomeNo" 
                            value="no"
                            {{ $onlyIncomeValue === 'no' ? 'checked' : '' }}
                        >
                        <label class="form-check-label custom-label" for="onlyIncomeNo">No</label>
                    </div>
                    <input 
                        type="text" 
                        name="only_income_details" 
                        class="form-control border-dark mt-2" 
                        id="onlyIncomeDetails" 
                        placeholder="Add more details here about any other income" 
                        value="{{ old('only_income_details', $incomes->only_income_details ?? '') }}"
                        style="display: {{ $showIncomeDetails ? 'block' : 'none' }};"
                    >
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    function updateInputNames(section, index) {
        const inputMap = {
            "employer_abn": `employer_abn[${index}]`,
            "total_tax_withheld": `total_tax_withheld[${index}]`,
            "gross_payments": `gross_payments[${index}]`,
            "income_items": `income_items[${index}]`,
            "allowances": `allowances[${index}]`,
            "fringe_benefits": `fringe_benefits[${index}]`,
            "reportable_super": `reportable_super[${index}]`
        };

        Object.entries(inputMap).forEach(([baseName, newName]) => {
            section.querySelectorAll(`input[name^="${baseName}"]`).forEach((input) => {
                input.name = newName;
            });
        });
    }

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
    }

    function updateIncomeRadioIds(section, index) {
        const yesRadio = section.querySelector(".income-yes");
        const noRadio = section.querySelector(".income-no");
        const yesLabel = section.querySelector("label[for^='incomeYes']");
        const noLabel = section.querySelector("label[for^='incomeNo']");

        if (yesRadio) {
            yesRadio.id = "incomeYes_" + index;
            if (yesLabel) yesLabel.setAttribute("for", yesRadio.id);
        }
        if (noRadio) {
            noRadio.id = "incomeNo_" + index;
            if (noLabel) noLabel.setAttribute("for", noRadio.id);
        }
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
            updateInputNames(block, idx);
            initIncomeRadio(block);
        });
    }

    const employerContainer = document.getElementById("employerContainer");
    initAllEmployerBlocks();

    document.querySelector(".btn_add_employer").addEventListener("click", () => {
        const blocks = employerContainer.querySelectorAll(".employer-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);
        const newIndex = blocks.length;

        updateIncomeRadioIds(newBlock, newIndex);
        updateInputNames(newBlock, newIndex);
        clearInputs(newBlock);
        initIncomeRadio(newBlock);

        employerContainer.appendChild(newBlock);
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

    if (onlyIncomeYes && onlyIncomeNo && onlyIncomeDetails) {
        onlyIncomeYes.addEventListener("change", toggleOnlyIncomeDetails);
        onlyIncomeNo.addEventListener("change", toggleOnlyIncomeDetails);
    }
});
</script>