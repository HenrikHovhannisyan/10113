<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Mobile Phone</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div id="mobileExpenseContainer">
    <p class="choosing-business-type-text">
        Do you use your mobile phone for work purposes? Are you sometimes required to call clients or other staff members on your personal mobile phone? If you answered “yes”, then you might be able to claim the cost of these calls. (If your employer paid for it, don’t claim it.)
    </p>
    <div class="grin_box_border mb-3 mobile-expense-block">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Why do you use your mobile for work? (eg. “I manage shift workers all hours”)</label>
          <input type="text" class="form-control border-dark reason" name="mobile_reason[]" placeholder='00.00$”'>
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">What % of your mobile calls are related to your work? (eg. 30%)</label>
          <input type="text" class="form-control border-dark percentage" name="mobile_percentage[]" placeholder="0%">
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Total of your mobile bills for the year (July 2024 - June 2025)</label>
          <input type="number" step="0.01" class="form-control border-dark mobile-total" name="mobile_total[]" placeholder="00.00$">
        </div>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn_add" id="addMobileExpense">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another mobile expense
    </button>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="choosing-business-type-text">Estimated final amount of your claim:</label>
      <p class="choosing-business-type-text text-secondary" id="mobileClaim">00.00$</p>
    </div>
  </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("mobileExpenseContainer");
  const addBtn = document.getElementById("addMobileExpense");
  const totalDisplay = document.getElementById("mobileClaim");

  function updateMobileClaim() {
    let totalClaim = 0;
    const blocks = container.querySelectorAll(".mobile-expense-block");

    blocks.forEach(block => {
      const totalInput = block.querySelector(".mobile-total");
      const percentInput = block.querySelector(".percentage");

      let total = parseFloat(totalInput.value) || 0;
      let percent = parseFloat(percentInput.value) || 0;

      if (percent > 0 && percent <= 100) {
        totalClaim += (total * percent) / 100;
      }
    });

    totalDisplay.textContent = totalClaim.toFixed(2) + "$";
  }

  function initMobileBlock(block) {
    const percentInput = block.querySelector(".percentage");
    const totalInput = block.querySelector(".mobile-total");

    percentInput.addEventListener("input", updateMobileClaim);
    totalInput.addEventListener("input", updateMobileClaim);
  }

  document.querySelectorAll(".mobile-expense-block").forEach(initMobileBlock);

  addBtn.addEventListener("click", () => {
    const blocks = container.querySelectorAll(".mobile-expense-block");
    const lastBlock = blocks[blocks.length - 1];
    const clone = lastBlock.cloneNode(true);

    clone.querySelectorAll("input").forEach(input => input.value = "");

    container.appendChild(clone);
    initMobileBlock(clone);
  });
});
</script>
