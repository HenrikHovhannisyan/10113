<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Gifts / Donations</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div id="donationContainer">
    <p class="choosing-business-type-text">
        To be eligible, donations must be made to a registered charity and you should have a tax deductible gift receipt for each donation.
    </p>
    <section class="grin_box_border mb-3 donation-block">
      <div class="row mb-2">
        <div class="col-md-12">
          <p class="choosing-business-type-text">Do you have a receipt for all donations that you are claiming?</p>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" id="has_receipt_yes" name="has_receipt_0" value="yes">

            <label class="form-check-label custom-label" for="has_receipt_yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" id="has_receipt_no" name="has_receipt_0" value="no">
            <label class="form-check-label custom-label" for="has_receipt_no">No</label>
          </div>
        </div>
      </div>

      <div class="row mb-2 align-items-end">
        <div class="col-md-6 mb-2">
          <label class="choosing-business-type-text">Charity name or organisation</label>
          <input type="text" name="charity_name[]" class="form-control border-dark" placeholder="...">
        </div>
        <div class="col-md-6 mb-2">
          <label class="choosing-business-type-text">Total donation to this organisation</label>
          <input type="number" name="donation_amount[]" class="form-control border-dark donation-input" placeholder="00.00$" step="0.01">
        </div>
      </div>
    </section>
  </div>

  <div class="mb-3">
    <button type="button" class="btn btn_add" id="addDonationBtn">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another donation
    </button>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <p class="choosing-business-type-text">
        Your total gifts & donations claim based on the above:
      </p>
      <p class="choosing-business-type-text text-secondary" id="donationTotal">00.00$</p>
    </div>
  </div>
</form>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("donationContainer");
  const addBtn = document.getElementById("addDonationBtn");
  const totalDisplay = document.getElementById("donationTotal");

/*   function updateTotal() {
    let total = 0;
    container.querySelectorAll(".donation-input").forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });
    totalDisplay.textContent = total.toFixed(2) + "$";
  } */

  function initDonationBlock(block, index) {
    block.querySelectorAll("input").forEach(input => {
      if (input.type !== "radio") input.value = "";
    });

    block.querySelectorAll("input[type=radio]").forEach(radio => {
      const newName = `has_receipt_${index}`;
      radio.name = newName;
      radio.checked = false;
    });

    block.querySelector(".donation-input").addEventListener("input", updateTotal);
  }

  addBtn.addEventListener("click", () => {
    const blocks = container.querySelectorAll(".donation-block");
    const lastBlock = blocks[blocks.length - 1];
    const newBlock = lastBlock.cloneNode(true);
    const newIndex = blocks.length;

    container.appendChild(newBlock);
    initDonationBlock(newBlock, newIndex);
  });

  initDonationBlock(container.querySelector(".donation-block"), 0);
});
</script>
