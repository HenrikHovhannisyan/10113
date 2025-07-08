<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Employment Termination Payments (ETP)</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <p class="choosing-business-type-text">
        Please enter the details from your ETP Income Statement or PAYG statement.
    </p>
    <p class="choosing-business-type-text">
        If you can’t find the Income Statement or PAYG document for your termination or redundancy payment, please ring the employer who gave you the payment and ask for a copy. Or if that is a problem, please click the mail icon up top and add a note telling us that you received an ETP but you don’t have a statement; we will try to track down the details for you.
    </p>
    <div class="grin_box_border mb-4">
        <div id="etpContainer">
            <section class="etp-block">
                <div class="row">
                    <p class="choosing-business-type-text">
                        ETP Date of Payment
                    </p>

                    <!-- Day -->
                    <div class="col-md-4 mb-3">
                        <select name="etp_day" class="form-control border-dark">
                            <option value="">Day</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Month -->
                    <div class="col-md-4 mb-3">
                        <select name="etp_month" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Year -->
                    <div class="col-md-4 mb-3">
                        <select name="etp_year" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($i = date('Y'); $i >= 1990; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Tax Withheld Amount</p>
                        <input type="number" name="etp_tax_withheld[]" class="form-control border-dark" placeholder="00.00$">
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">ETP Taxable Component</p>
                        <input type="number" name="etp_taxable_component[]" class="form-control border-dark" placeholder="00.00$">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Employment Termination Payment (ETP) Code</p>
                        <select name="etp_code[]" class="form-control border-dark">
                            <option value="">Choose</option>
                            <option value="R">R: excluded life benefit termination payment...</option>
                            <option value="S">S: excluded life benefit termination payment part of earlier year</option>
                            <option value="O">O: non-excluded life benefit (e.g. golden handshake)</option>
                            <option value="P">P: non-excluded life benefit part of earlier year</option>
                            <option value="D">D: death benefit to dependant</option>
                            <option value="N">N: death benefit to non-dependant</option>
                            <option value="B">B: death benefit part of earlier year</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Payer's ABN</p>
                        <input type="text" name="etp_abn[]" class="form-control border-dark" placeholder="51 824 753 556">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn_add" id="btnAddETP">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                Add another ETP
            </button>
            <button type="button" class="btn btn_delete" id="btnDeleteETP">
                Delete ETP
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <p class="choosing-business-type-text">Your total tax withheld from ETP is</p>
            <p class="choosing-business-type-text text-secondary" id="totalETPTax">00.00$</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <p class="choosing-business-type-text">Your total taxable component from ETP is</p>
            <p class="choosing-business-type-text text-secondary" id="totalETPComponent">00.00$</p>
        </div>
    </div>

    <div class="row mb-3 align-items-end">
        <p class="choosing-business-type-text">
            Add ETP income statement here or PAYG summary (optional)
        </p>
        <div class="col-md-6 mb-3">
            <input type="file" name="etp_attachment" id="etpFileInput" class="d-none">
            <button type="button" class="btn btn_add" id="triggerETPFile">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                Choose file
            </button>
        </div>
        <div class="col-md-6 mb-3">
            <p id="etpFileName" class="choosing-business-type-text text-muted mb-0">
                No file chosen
            </p>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const etpContainer = document.getElementById("etpContainer");
    const btnAdd = document.getElementById("btnAddETP");
    const btnDelete = document.getElementById("btnDeleteETP");

    btnAdd.addEventListener("click", function () {
        const blocks = etpContainer.querySelectorAll(".etp-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);

        newBlock.querySelectorAll("input").forEach(input => {
            input.value = "";
        });

        etpContainer.appendChild(newBlock);
    });

    btnDelete.addEventListener("click", function () {
        const blocks = etpContainer.querySelectorAll(".etp-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });

    const etpInput = document.getElementById("etpFileInput");
    const etpTrigger = document.getElementById("triggerETPFile");
    const fileNameDisplay = document.getElementById("etpFileName");

    etpTrigger.addEventListener("click", () => etpInput.click());

    etpInput.addEventListener("change", () => {
        fileNameDisplay.textContent = etpInput.files.length ? etpInput.files[0].name : "No file chosen";
    });
});
</script>
