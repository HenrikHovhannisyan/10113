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
                <section class="allowance-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Please select the type of allowance you received</p>
                            <select name="allowance_type[]" class="form-select border-dark allowance-type-select">
                                <option value="" disabled selected>Choose</option>
                                <option value="Newstart">Newstart</option>
                                <option value="JobSeeker Allowance">JobSeeker Allowance</option>
                                <option value="Youth Allowance">Youth Allowance</option>
                                <option value="Parenting Payment (Partnered)">Parenting Payment (Partnered)</option>
                                <option value="Mature Age Allowance">Mature Age Allowance</option>
                                <option value="Partner Allowance">Partner Allowance</option>
                                <option value="Sickness Allowance">Sickness Allowance</option>
                                <option value="Special Benefit">Special Benefit</option>
                                <option value="Widow Allowance">Widow Allowance</option>
                                <option value="Austudy Payment">Austudy Payment</option>
                                <option value="Other">Other (Please Specify)</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Other Allowance (specify)</p>
                            <input
                                type="text"
                                name="allowance_other[]"
                                class="form-control border-dark allowance-other-input"
                                placeholder="What do you do for a living?"
                                disabled
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Tax withheld from this Government allowance</p>
                            <input
                                type="number"
                                name="allowance_tax_withheld[]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total amount received from this government allowance</p>
                            <input
                                type="number"
                                name="allowance_total_received[]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                            >
                        </div>
                    </div>
                </section>
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

        newBlock.querySelectorAll("input, select").forEach(el => {
            if (el.tagName === "SELECT") {
                el.selectedIndex = 0;
            } else {
                el.value = "";
            }
        });

        container.appendChild(newBlock);
        initAllBlocks();
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
