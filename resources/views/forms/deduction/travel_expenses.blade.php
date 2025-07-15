<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Work-Related Travel Expenses</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div id="travelExpenseContainer">
    <p class="choosing-business-type-text">
      For work-related travel costs other than using your car. Can include airfares, bus, train, taxi, meals and accommodation. Does not include travel between home and work. Only include items that you paid for yourself and were not repaid by your employer.
    </p>
    <div class="grin_box_border mb-3 travel-expense-block">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Type of travel expense</label>
          <select class="form-control border-dark expense-type" name="travel_type[]">
            <option value="" disabled selected>Select</option>
            <option value="Airfares">Airfares</option>
            <option value="Accommodation">Accommodation</option>
            <option value="Meals">Meals</option>
            <option value="Taxi">Taxi</option>
            <option value="Bus">Bus</option>
            <option value="Train">Train</option>
            <option value="Other">Other (please specify)</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Specify if 'Other'</label>
          <input type="text" class="form-control border-dark other-description" name="travel_other[]" placeholder="What do you do for a living?" disabled>
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Total amount you paid for this item</label>
          <input type="number" step="0.01" class="form-control border-dark travel-amount" name="travel_amount[]" placeholder="00.00$">
        </div>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn_add" id="addTravelExpense">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another travel expense
    </button>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="choosing-business-type-text">Your total travel claim based on the above:</label>
      <p class="choosing-business-type-text text-secondary" id="totalClaim">00.00$</p>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="choosing-business-type-text">Is any travel allowance listed on your PAYG Summary?</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="payg_allowance" id="paygYes" value="yes">

        <label class="form-check-label custom-label" for="paygYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio" type="radio" name="payg_allowance" id="paygNo" value="no">

        <label class="form-check-label custom-label" for="paygNo">No</label>
      </div>
    </div>
  </div>

<div class="col-12 mt-4 mb-3">
  <p class="choosing-business-type-text">
    Attach receipts or a log of your travel expenses (optional)
  </p>
  <input
    type="file"
    name="travel_receipt"
    id="travelFileInput"
    class="d-none"
  />
  <button type="button" class="btn btn_add" id="triggerTravelFile">
    <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Choose file
  </button>
  <p
    id="travelSelectedFile"
    class="choosing-business-type-text text-muted mb-0 mt-2"
  >
    No file chosen
  </p>
</div>

</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("travelExpenseContainer");
  const addBtn = document.getElementById("addTravelExpense");
  const totalDisplay = document.getElementById("totalClaim");

  function handleOtherInput(selectEl, inputEl) {
    inputEl.disabled = selectEl.value !== "Other";
    if (inputEl.disabled) inputEl.value = "";
  }

  function updateTotal() {
    const amounts = container.querySelectorAll(".travel-amount");
    let total = 0;
    amounts.forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });
    totalDisplay.textContent = total.toFixed(2) + "$";
  }

  function initTravelBlock(block) {
    const select = block.querySelector(".expense-type");
    const otherInput = block.querySelector(".other-description");
    const amountInput = block.querySelector(".travel-amount");

    select.addEventListener("change", () => handleOtherInput(select, otherInput));
    amountInput.addEventListener("input", updateTotal);
  }

  document.querySelectorAll(".travel-expense-block").forEach(initTravelBlock);

  addBtn.addEventListener("click", () => {
    const blocks = container.querySelectorAll(".travel-expense-block");
    const lastBlock = blocks[blocks.length - 1];
    const clone = lastBlock.cloneNode(true);

    clone.querySelectorAll("input").forEach(input => {
      input.value = "";
      if (input.classList.contains("other-description")) input.disabled = true;
    });
    clone.querySelector("select").value = "";

    container.appendChild(clone);
    initTravelBlock(clone);
  });
});

// File upload trigger and filename display
const travelFileInput = document.getElementById("travelFileInput");
const travelTrigger = document.getElementById("triggerTravelFile");
const travelFileDisplay = document.getElementById("travelSelectedFile");

travelTrigger.addEventListener("click", () => travelFileInput.click());
travelFileInput.addEventListener("change", () => {
  travelFileDisplay.textContent =
    travelFileInput.files.length > 0
      ? travelFileInput.files[0].name
      : "No file chosen";
});

</script>
