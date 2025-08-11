<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Government Allowances</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>

        <p class="choosing-business-type-text">
            This can include Newstart/JobSeeker Allowance, Youth Allowance, Parenting Payment (Partnered) and any other Government allowance you received.
        </p>
        <p class="choosing-business-type-text">
            Where to find them? Check the income summary or letters you received from Centrelink or the Government Department that sent you money.
        </p>
        <p class="choosing-business-type-text">
            If you received more than one, add additional allowances below.
        </p>

        <div class="grin_box_border">
            <div id="allowancesContainer">
                @php
                    $allowanceCount = max(
                        count(old('allowance_type', [])),
                        isset($incomes) ? count($incomes->allowance_type ?? []) : 0,
                        1
                    );
                @endphp
                
                @for($i = 0; $i < $allowanceCount; $i++)
                <section class="allowance-block" data-index="{{ $i }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Please select the type of allowance you received</p>
                            @php
                                $selectedType = old("allowance_type.$i", $incomes->allowance_type[$i] ?? '');
                                $otherValue = old("allowance_other.$i", $incomes->allowance_other[$i] ?? '');
                                $isOtherSelected = ($selectedType === 'Other');
                            @endphp
                            
                            <select name="allowance_type[{{ $i }}]" class="form-select border-dark allowance-type-select">
                                <option value="" disabled {{ !$selectedType ? 'selected' : '' }}>Choose</option>
                                <option value="Newstart" {{ $selectedType === 'Newstart' ? 'selected' : '' }}>Newstart</option>
                                <option value="JobSeeker Allowance" {{ $selectedType === 'JobSeeker Allowance' ? 'selected' : '' }}>JobSeeker Allowance</option>
                                <option value="Youth Allowance" {{ $selectedType === 'Youth Allowance' ? 'selected' : '' }}>Youth Allowance</option>
                                <option value="Parenting Payment (Partnered)" {{ $selectedType === 'Parenting Payment (Partnered)' ? 'selected' : '' }}>Parenting Payment (Partnered)</option>
                                <option value="Mature Age Allowance" {{ $selectedType === 'Mature Age Allowance' ? 'selected' : '' }}>Mature Age Allowance</option>
                                <option value="Partner Allowance" {{ $selectedType === 'Partner Allowance' ? 'selected' : '' }}>Partner Allowance</option>
                                <option value="Sickness Allowance" {{ $selectedType === 'Sickness Allowance' ? 'selected' : '' }}>Sickness Allowance</option>
                                <option value="Special Benefit" {{ $selectedType === 'Special Benefit' ? 'selected' : '' }}>Special Benefit</option>
                                <option value="Widow Allowance" {{ $selectedType === 'Widow Allowance' ? 'selected' : '' }}>Widow Allowance</option>
                                <option value="Austudy Payment" {{ $selectedType === 'Austudy Payment' ? 'selected' : '' }}>Austudy Payment</option>
                                <option value="Other" {{ $isOtherSelected ? 'selected' : '' }}>Other (Please Specify)</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Other Allowance (specify)</p>
                            <input
                                type="text"
                                name="allowance_other[{{ $i }}]"
                                class="form-control border-dark allowance-other-input"
                                placeholder="What do you do for a living?"
                                value="{{ $isOtherSelected ? $otherValue : '' }}"
                                {{ $isOtherSelected ? '' : 'disabled' }}
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Tax withheld from this Government allowance</p>
                            <input
                                type="number"
                                name="allowance_tax_withheld[{{ $i }}]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                                value="{{ old("allowance_tax_withheld.$i", $incomes->allowance_tax_withheld[$i] ?? '') }}"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total amount received from this government allowance</p>
                            <input
                                type="number"
                                name="allowance_total_received[{{ $i }}]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                                value="{{ old("allowance_total_received.$i", $incomes->allowance_total_received[$i] ?? '') }}"
                            >
                        </div>
                    </div>
                </section>
                @endfor
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="button" class="btn btn_add btn_add_allowance mb-2">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another Government Allowance
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_allowance mb-2">
                        Delete another Government Allowance
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("allowancesContainer");
    const addBtn = document.querySelector(".btn_add_allowance");
    const deleteBtn = document.querySelector(".btn_delete_allowance");

    function initAllowanceBlock(section) {
        const select = section.querySelector(".allowance-type-select");
        const input = section.querySelector(".allowance-other-input");

        function toggleInput() {
            if (select.value === "Other") {
                input.disabled = false;
            } else {
                input.disabled = true;
                input.value = "";
            }
        }

        select.addEventListener("change", toggleInput);
        toggleInput();
    }

    function initAllBlocks() {
        const blocks = container.querySelectorAll(".allowance-block");
        blocks.forEach(initAllowanceBlock);
    }

    addBtn.addEventListener("click", () => {
        const blocks = container.querySelectorAll(".allowance-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);
        const newIndex = blocks.length;

        newBlock.dataset.index = newIndex;
        
        newBlock.querySelectorAll("input, select").forEach(el => {
            if (el.tagName === "SELECT") {
                el.selectedIndex = 0;
            } else {
                el.value = "";
            }
            
            if (el.name) {
                const nameParts = el.name.split('[');
                if (nameParts.length > 1) {
                    const baseName = nameParts[0];
                    el.name = `${baseName}[${newIndex}]`;
                }
            }
        });

        container.appendChild(newBlock);
        
        initAllowanceBlock(newBlock);
    });

    deleteBtn.addEventListener("click", () => {
        const blocks = container.querySelectorAll(".allowance-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });

    initAllBlocks();
});
</script>