<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Employee Share Schemes (ESS)</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <p class="choosing-business-type-text">
        Enter the details of any Employee Share Schemes (ESS) you received. If a field does not apply to you, please leave it blank.
    </p>
    <div id="essContainer">
        <div class="grin_box_border mb-4 ess-block">
            <p class="choosing-business-type-text">
                If you received more than one Employee Share Scheme, click the “Add another scheme” button to enter the details.
            </p>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">Discount from taxed upfront schemes - eligible for reduction</label>
                    <input type="text" name="discount_upfront_eligible[]" class="form-control border-dark" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">Discount from taxed upfront schemes - not eligible for reduction</label>
                    <input type="text" name="discount_upfront_not_eligible[]" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">Discount from deferral schemes</label>
                    <input type="text" name="discount_deferral[]" class="form-control border-dark" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">TFN amounts withheld from discount</label>
                    <input type="text" name="tfn_withheld[]" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">Foreign source discounts</label>
                    <input type="text" name="foreign_discounts[]" class="form-control border-dark" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="choosing-business-type-text">Employee share scheme foreign tax paid</label>
                    <input type="text" name="foreign_tax_paid[]" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn_add" id="btnAddESS">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                Add another scheme
            </button>
            <button type="button" class="btn btn_delete" id="btnDeleteESS">
                Delete scheme
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const essContainer = document.getElementById("essContainer");
    const btnAddESS = document.getElementById("btnAddESS");
    const btnDeleteESS = document.getElementById("btnDeleteESS");

    btnAddESS.addEventListener("click", function () {
        const blocks = essContainer.querySelectorAll(".ess-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);

        newBlock.querySelectorAll("input").forEach(input => input.value = "");

        essContainer.appendChild(newBlock);
    });

    btnDeleteESS.addEventListener("click", function () {
        const blocks = essContainer.querySelectorAll(".ess-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });
});
</script>
