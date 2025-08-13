<section>
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
        @php
            $etps = old('termination_payments', isset($incomes) ? $incomes->termination_payments ?? [] : []);
            $numericItems = array_filter($etps, function($key) {
                return is_int($key);
            }, ARRAY_FILTER_USE_KEY);
            $etpCount = max(count($numericItems), 1);
        @endphp

        <div id="etpContainer">
            @for($i = 0; $i < $etpCount; $i++)
            <section class="etp-block" data-index="{{ $i }}">
                <div class="row">
                    <p class="choosing-business-type-text">ETP Date of Payment</p>

                    <div class="col-md-4 mb-3">
                        <select name="termination_payments[{{ $i }}][day]" class="form-control border-dark">
                            <option value="">Day</option>
                            @for ($d = 1; $d <= 31; $d++)
                                <option value="{{ $d }}" {{ old("termination_payments.$i.day", $etps[$i]['day'] ?? '') == $d ? 'selected' : '' }}>{{ $d }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <select name="termination_payments[{{ $i }}][month]" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}" {{ old("termination_payments.$i.month", $etps[$i]['month'] ?? '') == $m ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <select name="termination_payments[{{ $i }}][year]" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($y = date('Y'); $y >= 1990; $y--)
                                <option value="{{ $y }}" {{ old("termination_payments.$i.year", $etps[$i]['year'] ?? '') == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Tax Withheld Amount</p>
                        <input type="number" name="termination_payments[{{ $i }}][tax_withheld]" class="form-control border-dark" placeholder="00.00$" value="{{ old("termination_payments.$i.tax_withheld", $etps[$i]['tax_withheld'] ?? '') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">ETP Taxable Component</p>
                        <input type="number" name="termination_payments[{{ $i }}][taxable_component]" class="form-control border-dark" placeholder="00.00$" value="{{ old("termination_payments.$i.taxable_component", $etps[$i]['taxable_component'] ?? '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Employment Termination Payment (ETP) Code</p>
                        <select name="termination_payments[{{ $i }}][code]" class="form-control border-dark">
                            <option value="">Choose</option>
                            <option value="R" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'R' ? 'selected' : '' }}>R: excluded life benefit termination payment...</option>
                            <option value="S" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'S' ? 'selected' : '' }}>S: excluded life benefit termination payment part of earlier year</option>
                            <option value="O" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'O' ? 'selected' : '' }}>O: non-excluded life benefit (e.g. golden handshake)</option>
                            <option value="P" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'P' ? 'selected' : '' }}>P: non-excluded life benefit part of earlier year</option>
                            <option value="D" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'D' ? 'selected' : '' }}>D: death benefit to dependant</option>
                            <option value="N" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'N' ? 'selected' : '' }}>N: death benefit to non-dependant</option>
                            <option value="B" {{ old("termination_payments.$i.code", $etps[$i]['code'] ?? '') == 'B' ? 'selected' : '' }}>B: death benefit part of earlier year</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">Payer's ABN</p>
                        <input type="text" name="termination_payments[{{ $i }}][abn]" class="form-control border-dark" placeholder="51 824 753 556" value="{{ old("termination_payments.$i.abn", $etps[$i]['abn'] ?? '') }}">
                    </div>
                </div>
            </section>
            @endfor
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

    <div class="row mb-3 align-items-end">
        <p class="choosing-business-type-text">
            Add ETP income statement here or PAYG summary (optional)
        </p>
        <div class="col-md-6 mb-3">
            <input type="file" name="termination_payments[etp_attachment]" id="etpFileInput" class="d-none">
            <button type="button" class="btn btn_add" id="triggerETPFile">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                Choose file
            </button>
        </div>
        <div class="col-md-6 mb-3">
            <p id="etpFileName" class="choosing-business-type-text text-muted mb-0">
                {{ old('etp_attachment_name', 'No file chosen') }}
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const etpContainer = document.getElementById("etpContainer");
    const btnAdd = document.getElementById("btnAddETP");
    const btnDelete = document.getElementById("btnDeleteETP");

    // Сохраняем шаблон первого блока
    const template = etpContainer.querySelector(".etp-block").outerHTML;

    function refreshIndices() {
        const blocks = etpContainer.querySelectorAll(".etp-block");
        blocks.forEach((block, index) => {
            block.dataset.index = index;
            block.querySelectorAll("input, select").forEach(el => {
                if (el.name) {
                    // Меняем индекс в name
                    el.name = el.name.replace(/termination_payments\[\d+\]/, `termination_payments[${index}]`);
                }
            });
        });
    }

    btnAdd.addEventListener("click", function () {
        const newIndex = etpContainer.querySelectorAll(".etp-block").length;
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = template;
        const newBlock = tempDiv.firstElementChild;

        // Очищаем только значения инпутов и селектов нового блока
        newBlock.querySelectorAll("input").forEach(input => input.value = '');
        newBlock.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

        etpContainer.appendChild(newBlock);
        refreshIndices();
    });

    btnDelete.addEventListener("click", function () {
        const blocks = etpContainer.querySelectorAll(".etp-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
            refreshIndices();
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
