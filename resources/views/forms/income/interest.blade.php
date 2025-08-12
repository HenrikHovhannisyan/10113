<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Interest</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>
        <p class="choosing-business-type-text">
            Enter the interest you received from all bank accounts. Find this on your bank statements or online banking. If you have joint (shared) accounts, ensure you adjust the number of account holders.
        </p>
        <div class="grin_box_border">
            <div id="interestContainer">
                <section class="interest-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Number of Account Holders</p>
                            <input type="number" name="account_holders[]" class="form-control border-dark" placeholder="1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Tax Withheld from interest (if any)</p>
                            <input type="number" name="interest_tax_withheld[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Interest</p>
                            <input type="number" name="total_interest[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                    </div>
                </section>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add btn_add_interest">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another account
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_interest">
                        Delete account
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const interestContainer = document.getElementById("interestContainer");
    const addInterestBtn = document.querySelector(".btn_add_interest");
    const deleteInterestBtn = document.querySelector(".btn_delete_interest");

    addInterestBtn.addEventListener("click", () => {
        const blocks = interestContainer.querySelectorAll(".interest-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);

        // Очистить значения инпутов
        newBlock.querySelectorAll("input").forEach(input => input.value = "");

        interestContainer.appendChild(newBlock);
    });

    deleteInterestBtn.addEventListener("click", () => {
        const blocks = interestContainer.querySelectorAll(".interest-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });
});
</script>

