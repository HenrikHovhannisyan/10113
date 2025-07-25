<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Private Health Insurance Policy Detailse</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <div class="grin_box_border mb-4">
        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label for="family_status" class="choosing-business-type-text">
                    What was your family status on 30 June 2025?
                </label>
                <select id="family_status" name="family_status" class="form-select border-dark">
                    <option value="">Choose</option>
                    <option value="single">Single</option>
                    <option value="spouse">Had a spouse</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3 d-none" id="dependent_children_block">
                <label class="choosing-business-type-text">At that time, did you have any dependent children?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="dependent_children" id="children_yes" value="yes">
                    <label class="form-check-label custom-label" for="children_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="dependent_children" id="children_no" value="no">
                    <label class="form-check-label custom-label" for="children_no">No</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="input_option" class="choosing-business-type-text">Please choose one of the 3 options below</label>
                <select id="input_option" class="form-select border-dark">
                    <option value="">Choose</option>
                    <option value="etax">Let Etax collect my details</option>
                    <option value="attach">Attach my statement</option>
                    <option value="manual">Enter my details myself</option>
                </select>
            </div>
        </div>

        <!-- Etax green message -->
        <div class="text-success mb-3 d-none" id="etax_success_text">
            <strong>Great!</strong> Please continue to the next section. <br>
            We will add your Private Health cover to your tax return for you!
        </div>

        <!-- Attach my statement -->
        <div class="d-none" id="upload_statement_block">
            <div class="row mb-3 align-items-end">
                <p class="choosing-business-type-text">
                    Attach a copy of your annual private health cover statement
                </p>
                <div class="col-md-6 mb-3">
                    <input type="file" name="statement_file" id="statementFileInput" class="d-none">
                    <button type="button" class="btn btn_add" id="statementFileTrigger">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Choose file
                    </button>
                </div>
                <div class="col-md-6 mb-3">
                    <p id="statementFileName" class="choosing-business-type-text text-muted mb-0">
                        No file chosen
                    </p>
                </div>
            </div>
        </div>

        <!-- Manual input block container -->
        <div class="manual_input_block d-none">
            <div class="grin_box_border mb-3 health-statement-block">
                <p class="choosing-business-type-text mb-3 line-title">
                    Private Health Cover - Your Summary (line 1)
                </p>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="choosing-business-type-text">Health insurer ID</label>
                        <select name="health_insurer_id[]" class="form-select border-dark">
                            <option value="">Choose</option>
                            <option>ACA - ACA Health Benefits Fund</option>
                            <option>MYO - AIA Health Insurance</option>
                            <option>AHM - Australian Health Management Group</option>
                            <option>AUF - Australian Unity Health Limited</option>
                            <option>BUP - BUPA</option>
                            <option>CBC - CBHS Corporate Health Pty Ltd</option>
                            <option>CDH - Cessnock District Health Benefits Fund Limited</option>
                            <option>AHB - Defence Health Ltd</option>
                            <option>GMH-GMHBA Limited</option>
                            <option>FAI-GU Health</option>
                            <option>HBF - HBF Health Limited</option>
                            <option>HCI - Health Care Insurance Ltd</option>
                            <option>HIF - Health Insurance Fund of Australia Ltd</option>
                            <option>SPS - Health Partners</option>
                            <option>LHS - Latrobe Health Services</option>
                            <option>MBP - Medibank Private Limited</option>
                            <option>MDH - Mildura District Hospital Fund</option>
                            <option>NHB - Navy Health</option>
                            <option>NIB - NIB Health Funds Ltd</option>
                            <option>OMF - onemedifund</option>
                            <option>LHM - Peoplecare</option>
                            <option>PWA - Phoenix Health Fund Limited</option>
                            <option>SPE - Police Health Limited</option>
                            <option>QCH - Queensland Country Health Fund</option>
                            <option>RBH - Reserve Bank Health Society</option>
                            <option>RTE - rt health fund</option>
                            <option>CPS - see-u by HBF</option>
                            <option>SLM - St Lukes Medical and Hospital Benefits Assoc</option>
                            <option>NTF - Teachers Health Fund</option>
                            <option>QTU - Teachers' Union Health</option>
                            <option>AMA - The Doctors' Health Fund Pty Ltd</option>
                            <option>HCF - The Hospitals Contribution Fund of Australia Limited</option>
                            <option>TFS - Transport Health Pty Ltd</option>
                            <option>WFD - Westfund Limited</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="choosing-business-type-text">Membership number</label>
                        <input type="number" name="membership_number[]" class="form-control border-dark" placeholder="0">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="choosing-business-type-text">Your premiums eligible for Australian Government rebate</label>
                        <input type="text" name="premiums[]" class="form-control border-dark" placeholder="00.00$">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="choosing-business-type-text">Your premiums eligible for Australian Government rebate</label>
                        <input type="text" name="premiums[]" class="form-control border-dark" placeholder="00.00$">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="choosing-business-type-text">Benefit code</label>
                        <select name="benefit_code[]" class="form-select border-dark">
                            <option value="">Choose</option>
                            <option>30</option>
                            <option>31</option>
                            <option>35</option>
                            <option>36</option>
                            <option>40</option>
                            <option>41</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add" id="addStatementBtn">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Add another statement
                    </button>
                    <button type="button" class="btn btn_add" id="addSpouseStatementBtn">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Add spouse's statement
                    </button>
                </div>
            </div>

            <div class="row mb-3 align-items-end">
                <p class="choosing-business-type-text">
                    Confused? Just attach a copy of your annual private health cover statement, then we can complete this section for you.
                </p>
                <div class="col-md-6 mb-3">
                    <input type="file" name="private_health_statement" id="privateHealthInput" class="d-none">
                    <button type="button" class="btn btn_add" id="privateHealthTrigger">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                        Choose file
                    </button>
                </div>
                <div class="col-md-6 mb-3">
                    <p id="privateHealthFileName" class="choosing-business-type-text text-muted mb-0">
                        No file chosen
                    </p>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const familyStatus = document.getElementById('family_status');
    const dependentChildrenBlock = document.getElementById('dependent_children_block');
    const inputOption = document.getElementById('input_option');
    const etaxSuccessText = document.getElementById('etax_success_text');
    const uploadStatementBlock = document.getElementById('upload_statement_block');
    const manualInputBlock = document.querySelector('.manual_input_block');
    const addStatementBtn = document.getElementById('addStatementBtn');
    const privateHealthTrigger = document.getElementById('privateHealthTrigger');
    const privateHealthInput = document.getElementById('privateHealthInput');
    const privateHealthFileName = document.getElementById('privateHealthFileName');

    familyStatus.addEventListener('change', () => {
        if (familyStatus.value === 'single') {
            dependentChildrenBlock.classList.remove('d-none');
        } else {
            dependentChildrenBlock.classList.add('d-none');
        }
    });

    inputOption.addEventListener('change', () => {
        etaxSuccessText.classList.add('d-none');
        uploadStatementBlock.classList.add('d-none');
        manualInputBlock.classList.add('d-none');

        manualInputBlock.querySelectorAll('.health-statement-block').forEach((block, idx) => {
            block.style.display = 'none';
        });

        if (inputOption.value === 'etax') {
            etaxSuccessText.classList.remove('d-none');
        } else if (inputOption.value === 'attach') {
            uploadStatementBlock.classList.remove('d-none');
        } else if (inputOption.value === 'manual') {
            manualInputBlock.classList.remove('d-none');
            const firstBlock = manualInputBlock.querySelector('.health-statement-block');
            if (firstBlock) {
                firstBlock.style.display = 'block';
            }
        }
    });

    document.getElementById('statementFileTrigger').addEventListener('click', () => {
        document.getElementById('statementFileInput').click();
    });
    document.getElementById('statementFileInput').addEventListener('change', function () {
        const fileName = this.files[0]?.name || 'No file chosen';
        document.getElementById('statementFileName').textContent = fileName;
    });

    privateHealthTrigger.addEventListener('click', () => {
        privateHealthInput.click();
    });
    privateHealthInput.addEventListener('change', () => {
        const fileName = privateHealthInput.files[0]?.name || 'No file chosen';
        privateHealthFileName.textContent = fileName;
    });

    addStatementBtn.addEventListener('click', () => {
        const container = manualInputBlock;
        const existingBlocks = container.querySelectorAll('.health-statement-block');
        const lastBlock = existingBlocks[existingBlocks.length - 1];
        const newLineNumber = existingBlocks.length + 1;

        const clone = lastBlock.cloneNode(true);

        const title = clone.querySelector('.line-title');
        title.textContent = `Private Health Cover - Your Summary (line ${newLineNumber})`;

        clone.querySelectorAll('input').forEach(input => input.value = '');
        clone.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

        lastBlock.after(clone);

        clone.style.display = 'block';
    });

</script>
