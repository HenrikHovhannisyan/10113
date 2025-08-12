<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Dividends</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>
        <p class="choosing-business-type-text">
            Enter the dividends you received from all investments. Find this on your dividend statements or online share accounts. If you have joint (shared) ownership, ensure you adjust the number of account holders.
        </p>
        <div class="grin_box_border">
            <p class="choosing-business-type-text">
                Enter each investment separately. If you had more than one investment paying dividends, click the “add another dividend” button below.
            </p>
            <div id="dividendsContainer">
                <section class="dividends-block">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Number of Account Holders</p>
                            <input type="number" name="dividend_account_holders[]" class="form-control border-dark" placeholder="1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total unfranked amount</p>
                            <input type="number" name="unfranked_amount[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total franked amount</p>
                            <input type="number" name="franked_amount[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total franking credits</p>
                            <input type="number" name="franking_credits[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total tax amounts withheld</p>
                            <input type="number" name="dividend_tax_withheld[]" class="form-control border-dark" placeholder="00.00$">
                        </div>
                    </div>
                </section>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add btn_add_dividend">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another dividend
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_dividend">
                        Delete dividend
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const dividendsContainer = document.getElementById("dividendsContainer");
    const addDividendBtn = document.querySelector(".btn_add_dividend");
    const deleteDividendBtn = document.querySelector(".btn_delete_dividend");

    addDividendBtn.addEventListener("click", () => {
        const blocks = dividendsContainer.querySelectorAll(".dividends-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);

        newBlock.querySelectorAll("input").forEach(input => input.value = "");

        dividendsContainer.appendChild(newBlock);
    });

    deleteDividendBtn.addEventListener("click", () => {
        const blocks = dividendsContainer.querySelectorAll(".dividends-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });
});
</script>
