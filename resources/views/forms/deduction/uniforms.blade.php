<section>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">
        Work-related Uniform, Occupation Specific or Protective Clothing
    </h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div id="uniformContainer">
    <p class="choosing-business-type-text">
        Includes the purchase of work uniforms with logos, or protective clothing. You cannot claim ordinary clothing, business suits, etc.
    </p>
    <div class="grin_box_border mb-3 uniform-block">
        <div class="mb-3">
        <label class="choosing-business-type-text">Do you have a receipt for every uniform item you are claiming below?</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="has_receipt_0" id="has_receipt_0_yes" value="yes">
            <label class="form-check-label custom-label" for="has_receipt_0_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="has_receipt_0" id="has_receipt_0_no" value="no">
            <label class="form-check-label custom-label" for="has_receipt_0_no">No</label>
        </div>
        </div>


      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Type of clothing you bought</label>
          <select class="form-control border-dark uniform-type" name="uniform_type[]">
            <option value="" disabled selected>Choose</option>
            <option>Shirts (with logo)</option>
            <option>Shirts (protective/hi-vis)</option>
            <option>Pants (with logo)</option>
            <option>Pants (protective/hi-vis)</option>
            <option>Protective/Safety boots</option>
            <option>Non slip shoes</option>
            <option>Checked Chef pants</option>
            <option>Hi-Vis vest</option>
            <option value="Other">Other (please specify)</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">If 'Other', please specify</label>
          <input type="text" class="form-control border-dark other-uniform" name="uniform_other[]" placeholder="Please enter the type of uniform you are claiming" disabled>
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Total amount you paid for this item</label>
          <input type="number" step="0.01" class="form-control border-dark" name="uniform_amount[]" placeholder="00.00$">
        </div>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn_add" id="addUniformBtn">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another uniform item
    </button>
  </div>


  <div class="col-12 mt-4 mb-3">
    <label class="choosing-business-type-text">Attach a simple breakdown of your expenses (optional)</label>
    <input type="file" name="uniforms[uniform_receipt]" id="uniformFileInput" class="d-none" /><br>
    <button type="button" class="btn btn_add" id="triggerUniformFile">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Choose file
    </button>
    <p id="uniformSelectedFile" class="choosing-business-type-text text-muted mt-2 mb-0">No file chosen</p>
  </div>

  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">
        Laundry Expenses
    </h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>
  <p class="choosing-business-type-text">
    If you entered any work uniform above that you regularly wash, you can also usually claim the cost of laundering those items up to $150 per year.
  </p>
  <div class="grin_box_border mt-4">
    <div class="row mb-3">
        <p class="choosing-business-type-text mb-3">
            Please complete the fields below and we will calculate your laundry claim for you.
        </p>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Please select whether you wash your uniform separately or mixed with other non-work clothes</label>
        <select class="form-control border-dark" name="uniforms[laundry_type]">
          <option value="" disabled selected>Choose</option>
          <option value="Separate Wash">Separate Wash</option>
          <option value="Mixed Wash">Mixed Wash</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text mt-0 mt-md-4">How many loads of laundry you do per week</label>
        <input type="number" step="1" class="form-control border-dark" name="uniforms[laundry_loads]" placeholder="00.00$">
      </div>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">How many weeks of the year did you work?</label>
        <input type="number" step="1" class="form-control border-dark" name="uniforms[weeks_worked]" placeholder="00.00$">
      </div>
    </div>

  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById("uniformContainer");
  const addBtn = document.getElementById("addUniformBtn");

  const uniformFileInput = document.getElementById("uniformFileInput");
  const uniformTrigger = document.getElementById("triggerUniformFile");
  const uniformFileDisplay = document.getElementById("uniformSelectedFile");

  function initUniformBlock(block) {
    const typeSelect = block.querySelector(".uniform-type");
    const otherInput = block.querySelector(".other-uniform");
    const amountInput = block.querySelector('input[name="uniform_amount[]"]');

    if (typeSelect && otherInput) {
      typeSelect.addEventListener("change", () => {
        otherInput.disabled = typeSelect.value !== "Other";
        if (otherInput.disabled) otherInput.value = "";
      });
    }

    if (amountInput) {
      amountInput.addEventListener("input", updateTotal);
    }
  }

  function updateTotal() {
    let total = 0;
    container.querySelectorAll('input[name="uniform_amount[]"]').forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });
  }

  document.querySelectorAll(".uniform-block").forEach(initUniformBlock);

  addBtn.addEventListener("click", () => {
    const lastBlock = container.querySelector(".uniform-block:last-child");
    const clone = lastBlock.cloneNode(true);

    clone.querySelectorAll("input").forEach(input => {
      input.value = "";
      if (input.classList.contains("other-uniform")) input.disabled = true;
    });
    const select = clone.querySelector("select");
    if (select) select.value = "";

    const radios = clone.querySelectorAll('input[type="radio"]');
    const index = container.querySelectorAll(".uniform-block").length;
    radios.forEach((r, i) => {
    const newId = `has_receipt_${index}_${i === 0 ? "yes" : "no"}`;
    r.checked = false;
    r.name = `has_receipt_${index}`;
    r.id = newId;

    const label = r.closest(".form-check").querySelector("label");
    if (label) {
        label.setAttribute("for", newId);
    }
    });

    container.appendChild(clone);
    initUniformBlock(clone);
  });

  uniformTrigger.addEventListener("click", () => uniformFileInput.click());
  uniformFileInput.addEventListener("change", () => {
    uniformFileDisplay.textContent = uniformFileInput.files.length > 0
      ? uniformFileInput.files[0].name
      : "No file chosen";
  });
});
</script>
