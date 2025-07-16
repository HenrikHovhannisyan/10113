<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Home Office Expenses</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <p class="choosing-business-type-text">Please read this section carefully:</p>
  <div class="grin_box_border">
    <p class="choosing-business-type-text mb-3">
      If you worked at home this year and want to claim your expenses, you need to have a detailed record that shows the days and hours you worked at home, plus any expenses (related to your home office) that you’d like to claim as tax deductions.
    </p>

    <p class="choosing-business-type-text">Did you regularly work from home this year?</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="worked_from_home" id="workedFromHomeYes" value="yes">
      <label class="form-check-label custom-label" for="workedFromHomeYes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="worked_from_home" id="workedFromHomeNo" value="no">
      <label class="form-check-label custom-label" for="workedFromHomeNo">No</label>
    </div>

    <!-- Block: Have hours record -->
    <div id="hoursRecordBlock" style="display:none; margin-top: 1rem;">
      <p class="choosing-business-type-text">
        Do you have a record of the number of hours that you worked at home each day? (E.g. diary, timesheets, logbook.)
      </p>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="have_hours_record" id="hoursRecordYes" value="yes">
        <label class="form-check-label custom-label" for="hoursRecordYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="have_hours_record" id="hoursRecordNo" value="no">
        <label class="form-check-label custom-label" for="hoursRecordNo">No</label>
      </div>
    </div>

<!-- Block: YES -> Provide details -->
<div id="blockIfHoursRecordYes" class="col-md-6" style="display:none; margin-top: 1rem;">
    <div class="form-group mb-3">
        <label class="choosing-business-type-text" for="total_hours_worked_yes">
        How many hours in total did you work from home during the year?
        </label>
        <input type="number" min="0" id="total_hours_worked_yes" name="total_hours_worked_yes" class="form-control" value="0" />
    </div>

    <p class="choosing-business-type-text">
        Do you have other home office expenses to claim, such as home telephone, office furniture or stationery?
    </p>
    <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="other_home_expenses_yes" id="otherExpensesYes_YES" value="yes">
        <label class="form-check-label custom-label" for="otherExpensesYes_YES">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="other_home_expenses_yes" id="otherExpensesNo_YES" value="no">
        <label class="form-check-label custom-label" for="otherExpensesNo_YES">No</label>
    </div>

    <!-- NO block -->
    <div id="otherExpensesNoBlock_YES" style="display:none; margin-top:1rem;">
        <p class="choosing-business-type-text">
            Attach a record for the hours you worked from home (optional)
        </p>
        <input type="file" name="hours_worked_record_file_yes" id="hoursWorkedRecordFile_YES" class="d-none" />
        <button type="button" class="btn btn_add" id="triggerHoursWorkedFile_YES">
            <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Choose file
        </button>
        <p id="hoursWorkedFileName_YES" class="choosing-business-type-text text-muted mb-0 mt-2">No file chosen</p>
    </div>

    <!-- YES block expense -->
    <div class="expense-block" id="expense_block_yes_1" style="display:none; border:1px solid #ccc; padding:10px; margin-bottom:15px;">
        <label>Type of expense</label>
        <select name="expense_type_yes_1" class="form-control expense-type-select-yes">
            <option value="">Choose</option>
            <option value="telephone">Home Telephone Bills</option>
            <option value="furniture_over_300">Office furniture over $300</option>
            <option value="furniture_under_300">Office furniture under $300 (e.g. chair)</option>
            <option value="equipment_under_300">Office equipment under $300 (e.g. mouse)</option>
            <option value="repairs">Repairs to office equipment & furniture</option>
            <option value="stationery">Printing and Stationery</option>
        </select>

        <div class="purchase-date-yes" style="display:none; margin-top:10px;">
            <label>Purchase Date</label>
            <div class="d-flex gap-2">
                <input type="text" name="expense_day_yes_1" placeholder="DD" class="form-control" style="width:60px;">
                <input type="text" name="expense_month_yes_1" placeholder="MM" class="form-control" style="width:60px;">
                <input type="text" name="expense_year_yes_1" placeholder="YYYY" class="form-control" style="width:80px;">
            </div>
        </div>

        <label style="margin-top:10px;">What % of this expense is related to your work?</label>
        <input type="text" name="expense_percentage_yes_1" placeholder="0%" class="form-control">

        <label style="margin-top:10px;">What sort of records do you have for this expense?</label>
        <select name="expense_record_type_yes_1" class="form-control">
            <option value="">Choose</option>
            <option value="I">I: Invoice / Receipt</option>
            <option value="L">L: Log book</option>
            <option value="A">A: Allowance received</option>
            <option value="C">C: Actual recorded cost</option>
        </select>

        <label style="margin-top:10px;">Total cost of this item</label>
        <input type="text" name="expense_cost_yes_1" placeholder="00.00$" class="form-control">
    </div>
</div>

    <!-- Block: NO -> Ask about typical 4-week record -->
    <div id="blockIfHoursRecordNo" style="display:none; margin-top: 1rem;">
      <div class="grin_box_border">
        <p class="choosing-business-type-text">
          <strong>TIP:</strong> If you haven’t kept a record personally, check to see if your employer is able to provide you with a record of your work from home hours.
        </p>
      </div>

      <p class="choosing-business-type-text" style="margin-top: 1.5rem;">
        Do you have a record that represents the typical hours you worked at home for a continuous 4-week period (e.g. diary entries)?
      </p>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="typical_hours_record" id="typicalHoursYes" value="yes">
        <label class="form-check-label custom-label" for="typicalHoursYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="typical_hours_record" id="typicalHoursNo" value="no">
        <label class="form-check-label custom-label" for="typicalHoursNo">No</label>
      </div>

      <!-- If YES for typical_hours_record -->
      <div id="typicalHoursYesBlock" style="display: none; margin-top: 1rem;">
        <p class="choosing-business-type-text">
          Do you have other home office expenses to claim, such as home telephone, office furniture or stationery?
        </p>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="other_home_expenses" id="otherExpensesYes" value="yes">
          <label class="form-check-label custom-label" for="otherExpensesYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="other_home_expenses" id="otherExpensesNo" value="no">
          <label class="form-check-label custom-label" for="otherExpensesNo">No</label>
        </div>

        <div id="otherExpensesDetailsBlock" style="display: block; margin-top: 1rem;">
            <div class="form-group col-md-6 mb-3">
                <label for="number_of_expenses" class="choosing-business-type-text">
                    Number of expenses you need to claim (choose)
                </label>
                <select name="number_of_expenses" id="number_of_expenses" class="form-control border-dark">
                <option value="">Choose</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                </select>
            </div>
            
            <div class="grin_box_border p-3 mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-2">
                        <label class="choosing-business-type-text">Type of expense</label>
                        <select name="expense_type_1" class="form-control border-dark expense-type">
                            <option value="">Choose</option>
                            <option value="telephone">Home Telephone Bills</option>
                            <option value="furniture_over_300">Office furniture over $300</option>
                            <option value="furniture_under_300">Office furniture under $300 (e.g. chair)</option>
                            <option value="equipment_under_300">Office equipment under $300 (e.g. mouse)</option>
                            <option value="repairs">Repairs to office equipment & furniture</option>
                            <option value="stationery">Printing and Stationery</option>
                        </select>
                    </div>

                    <div class="form-group mb-2 furniture-date" id="furnitureDate_1" style="display: none;">
                        <label class="choosing-business-type-text">Purchase Date</label>
                        <div class="row">
                        <div class="col-4">
                            <select name="expense_day_1" class="form-control border-dark">
                                <option value="">Day</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="expense_month_1" class="form-control border-dark">
                                <option value="">Month</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="expense_year_1" class="form-control border-dark">
                                <option value="">Year</option>
                                @for ($i = date('Y'); $i >= 1990; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label class="choosing-business-type-text">What % of this expense is related to your work?</label>
                        <input type="text" name="expense_percentage_1" class="form-control border-dark" placeholder="0%">
                    </div>

                    <div class="form-group mb-2">
                        <label class="choosing-business-type-text">What sort of records do you have for this expense?</label>
                        <select name="expense_record_type_1" class="form-control border-dark">
                            <option value="">Choose</option>
                            <option value="I">I: Invoice / Receipt</option>
                            <option value="L">L: Log book</option>
                            <option value="A">A: Allowance received</option>
                            <option value="C">C: Actual recorded cost</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label class="choosing-business-type-text">Total cost of this item</label>
                        <input type="text" name="expense_cost_1" class="form-control border-dark" placeholder="00.00$">
                    </div>
                </div>
            </div>
        </div>


        <!-- File Upload -->
        <div class="col-12 mt-4 mb-3">
          <p class="choosing-business-type-text">
            Attach receipts or a log of your travel expenses (optional)
          </p>
        <input type="file" name="home_receipt" id="homeFileInput" class="d-none" />
        <button type="button" class="btn btn_add" id="triggerHomeFile">
        <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Choose file
        </button>
        <p id="homeSelectedFile" class="choosing-business-type-text text-muted mb-0 mt-2">
        No file chosen
        </p>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const $ = (id) => document.getElementById(id);

    const workedRadios = document.querySelectorAll('[name="worked_from_home"]');
    const hoursRecordRadios = document.querySelectorAll('[name="have_hours_record"]');
    const typicalHoursRadios = document.querySelectorAll('[name="typical_hours_record"]');

    function toggleHoursRecordBlock() {
        const worked = document.querySelector('input[name="worked_from_home"]:checked');
        if (worked && worked.value === "yes") {
        $("hoursRecordBlock").style.display = "block";
        } else {
        $("hoursRecordBlock").style.display = "none";
        $("blockIfHoursRecordYes").style.display = "none";
        $("blockIfHoursRecordNo").style.display = "none";
        $("typicalHoursYesBlock").style.display = "none";
        }
    }

    function toggleHoursDetailBlocks() {
        const selected = document.querySelector('input[name="have_hours_record"]:checked');
        if (selected?.value === "yes") {
        $("blockIfHoursRecordYes").style.display = "block";
        $("blockIfHoursRecordNo").style.display = "none";
        $("typicalHoursYesBlock").style.display = "none";
        } else if (selected?.value === "no") {
        $("blockIfHoursRecordYes").style.display = "none";
        $("blockIfHoursRecordNo").style.display = "block";
        }
    }

    function toggleTypicalHoursYesBlock() {
        const selected = document.querySelector('input[name="typical_hours_record"]:checked');
        $("typicalHoursYesBlock").style.display = selected?.value === "yes" ? "block" : "none";
    }

    const fileInput = $("homeFileInput");
    const fileTrigger = $("triggerHomeFile");
    const fileDisplay = $("homeSelectedFile");

    fileTrigger?.addEventListener("click", () => fileInput.click());
    fileInput?.addEventListener("change", () => {
        fileDisplay.textContent = fileInput.files[0]?.name || "No file chosen";
    });

    workedRadios.forEach(r => r.addEventListener("change", toggleHoursRecordBlock));
    hoursRecordRadios.forEach(r => r.addEventListener("change", toggleHoursDetailBlocks));
    typicalHoursRadios.forEach(r => r.addEventListener("change", toggleTypicalHoursYesBlock));

    toggleHoursRecordBlock();
    toggleHoursDetailBlocks();
    toggleTypicalHoursYesBlock();
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const expenseTypes = document.querySelectorAll('.expense-type');

    expenseTypes.forEach(select => {
        select.addEventListener('change', function () {
        const dateBlock = document.getElementById('furnitureDate_1');

        if (this.value === 'furniture_over_300') {
            dateBlock.style.display = 'block';
        } else {
            dateBlock.style.display = 'none';
        }
        });
    });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
  const yesRadio = document.getElementById("otherExpensesYes");
  const noRadio = document.getElementById("otherExpensesNo");

  const noBlock = document.getElementById("otherExpensesNoBlock");
  const yesBlock = document.getElementById("otherExpensesDetailsBlock");

  function toggleOtherExpensesBlocks() {
    if (yesRadio.checked) {
      yesBlock.style.display = "block";
      noBlock.style.display = "none";
    } else if (noRadio.checked) {
      yesBlock.style.display = "none";
      noBlock.style.display = "block";
    } else {
      yesBlock.style.display = "none";
      noBlock.style.display = "none";
    }
  }

  yesRadio.addEventListener("change", toggleOtherExpensesBlocks);
  noRadio.addEventListener("change", toggleOtherExpensesBlocks);

  toggleOtherExpensesBlocks();

  const fileInput = document.getElementById("hoursWorkedRecordFile");
  const fileTrigger = document.getElementById("triggerHoursWorkedFile");
  const fileNameDisplay = document.getElementById("hoursWorkedFileName");

  fileTrigger.addEventListener("click", () => fileInput.click());
  fileInput.addEventListener("change", () => {
    fileNameDisplay.textContent = fileInput.files[0]?.name || "No file chosen";
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const yesRadio_YES = document.getElementById("otherExpensesYes_YES");
  const noRadio_YES = document.getElementById("otherExpensesNo_YES");

  const noBlock_YES = document.getElementById("otherExpensesNoBlock_YES");
  const expenseBlock_YES = document.getElementById("expense_block_yes_1");

  function toggleOtherExpensesBlocks_YES() {
    if (yesRadio_YES.checked) {
      expenseBlock_YES.style.display = "block";
      noBlock_YES.style.display = "none";
    } else if (noRadio_YES.checked) {
      expenseBlock_YES.style.display = "none";
      noBlock_YES.style.display = "block";
    } else {
      expenseBlock_YES.style.display = "none";
      noBlock_YES.style.display = "none";
    }
  }

  yesRadio_YES?.addEventListener("change", toggleOtherExpensesBlocks_YES);
  noRadio_YES?.addEventListener("change", toggleOtherExpensesBlocks_YES);

  toggleOtherExpensesBlocks_YES();

  const fileInput_YES = document.getElementById("hoursWorkedRecordFile_YES");
  const fileTrigger_YES = document.getElementById("triggerHoursWorkedFile_YES");
  const fileNameDisplay_YES = document.getElementById("hoursWorkedFileName_YES");

  fileTrigger_YES?.addEventListener("click", () => fileInput_YES.click());
  fileInput_YES?.addEventListener("change", () => {
    fileNameDisplay_YES.textContent = fileInput_YES.files[0]?.name || "No file chosen";
  });

  const expenseTypeSelect_YES = document.querySelector('.expense-type-select-yes');
  const purchaseDateBlock_YES = document.querySelector('.purchase-date-yes');

  expenseTypeSelect_YES?.addEventListener('change', () => {
    if (expenseTypeSelect_YES.value === 'furniture_over_300') {
      purchaseDateBlock_YES.style.display = 'block';
    } else {
      purchaseDateBlock_YES.style.display = 'none';
    }
  });
});
</script>

