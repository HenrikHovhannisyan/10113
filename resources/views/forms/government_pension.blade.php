<form>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Australian Government Pensions</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>

        <p class="choosing-business-type-text">
            This can include Parenting Payment (Single), Aged Pension, Disability Support Pension, Carer Payments and any other Government pension you received.
        </p>
        <p class="choosing-business-type-text">
            If you received more than one, add additional pensions below.
        </p>

        <div class="grin_box_border">
            <div id="pensionsContainer">
                <section class="pension-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Please select the type of pension you received</p>
                            <select name="pension_type[]" class="form-select border-dark pension-type-select">
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
                            <p class="choosing-business-type-text">Other Pension (specify)</p>
                            <input
                                type="text"
                                name="pension_other[]"
                                class="form-control border-dark pension-other-input"
                                placeholder="What do you do for a living?"
                                disabled
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Tax withheld from this Government pension</p>
                            <input
                                type="number"
                                name="pension_tax_withheld[]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total amount received from this Government pension</p>
                            <input
                                type="number"
                                name="pension_total_received[]"
                                class="form-control border-dark"
                                placeholder="00.00$"
                            >
                        </div>
                    </div>
                </section>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <button type="button" class="btn btn_add btn_add_pension mb-2">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another government pension
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_pension mb-2">
                        Delete another government pension
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("pensionsContainer");
    const addBtn = document.querySelector(".btn_add_pension");
    const deleteBtn = document.querySelector(".btn_delete_pension");

    function initPensionBlock(section) {
        const select = section.querySelector(".pension-type-select");
        const input = section.querySelector(".pension-other-input");

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

    function initAllPensionBlocks() {
        const blocks = container.querySelectorAll(".pension-block");
        blocks.forEach(initPensionBlock);
    }

    addBtn.addEventListener("click", () => {
        const blocks = container.querySelectorAll(".pension-block");
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
        initAllPensionBlocks();
    });

    deleteBtn.addEventListener("click", () => {
        const blocks = container.querySelectorAll(".pension-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });

    initAllPensionBlocks();
});
</script>
