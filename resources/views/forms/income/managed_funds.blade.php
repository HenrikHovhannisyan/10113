<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Managed Funds</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>


        <div class="grin_box_border">
            <p class="choosing-business-type-text mb-3">
                Managed Fund investments NEED to be included on your tax return.
            </p>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="choosing-business-type-text">How many Managed Fund Statements do you have?</p>
                    <input type="number" name="managed_fund_count" class="form-control border-dark" placeholder="0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="choosing-business-type-text">
                        Would you like Tax-Easy to collect your information for your Managed Funds?
                    </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="tax_easy_collect" id="taxEasyYes" value="yes">
                        <label class="form-check-label custom-label" for="taxEasyYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="tax_easy_collect" id="taxEasyNo" value="no">
                        <label class="form-check-label custom-label" for="taxEasyNo">No</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3 align-items-end">
                <p class="choosing-business-type-text">
                    Attach Managed Fund statements here (optional)
                </p>
                <div class="col-md-6 mb-3">
                    <input type="file" name="managed_fund_files" id="managedFundInput" class="d-none">
                    <button type="button" class="btn btn_add" id="customFileTrigger">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Choose file
                    </button>
                </div>
                <div class="col-md-6 mb-3">
                    <p id="selectedFileName" class="choosing-business-type-text text-muted mb-0">
                        No file chosen
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("managedFundInput");
    const trigger = document.getElementById("customFileTrigger");
    const fileNameDisplay = document.getElementById("selectedFileName");

    trigger.addEventListener("click", () => {
        input.click();
    });

    input.addEventListener("change", () => {
        if (input.files.length > 0) {
            fileNameDisplay.textContent = input.files[0].name;
        } else {
            fileNameDisplay.textContent = "No file chosen";
        }
    });
});
</script>
