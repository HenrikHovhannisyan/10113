<section>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Other Income</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <div class="grin_box_border mb-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Assessable First Home Super Saver (FHSS) released amount - Category 3
        </label>
        <input type="number" step="0.01" name="fhss_amount" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Tax withheld for First Home Super Saver (FHSS) - Category 3
        </label>
        <input type="number" step="0.01" name="fhss_tax_withheld" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Taxable professional income</label>
        <input type="number" step="0.01" name="professional_income" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
  </div>

  <div class="grin_box_border mb-4" id="otherIncomeContainer">
    <div class="row other-income-block">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Other income type</label>
        <select name="other_income_type[]" class="form-control border-dark">
          <option value="">Select</option>
          <option value="lottery">Winnings from investment related lotteries and gambling</option>
          <option value="forex">Foreign exchange gains</option>
          <option value="securities">Gains on traditional securities</option>
          <option value="financial">Financial investments not shown elsewhere</option>
          <option value="asset_adjustment">Any assessable balancing adjustment when you stop holding a depreciating asset</option>
          <option value="work_in_progress">Work-in-progress amounts</option>
          <option value="ato_interest">ATO interest remitted</option>
          <option value="reimbursements">Reimbursements of tax-related expenses or election expenses</option>
          <option value="other">Other</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Amount you received</label>
        <input type="number" step="0.01" name="other_income_amount[]" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Assessable balancing adjustment from low value pool relating to financial investments
        </label>
        <input type="number" step="0.01" name="bal_adj_financial[]" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Assessable balancing adjustment from low value pool relating to rental property
        </label>
        <input type="number" step="0.01" name="bal_adj_rental[]" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Remaining assessable balancing adjustment</label>
        <input type="number" step="0.01" name="bal_adj_remaining[]" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-6 mb-3">
        <button type="button" class="btn btn_add btn_add_other_income">
          <img src="{{ asset('img/icons/plus.png') }}" alt="plus" />
          Add another item
        </button>
        <button type="button" class="btn btn_delete btn_delete_other_income">
          Delete item
        </button>
      </div>
    </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("otherIncomeContainer");
    const addBtn = document.querySelector(".btn_add_other_income");
    const deleteBtn = document.querySelector(".btn_delete_other_income");

    addBtn.addEventListener("click", () => {
      const blocks = container.querySelectorAll(".other-income-block");
      const lastBlock = blocks[blocks.length - 1];
      const newBlock = lastBlock.cloneNode(true);

      newBlock.querySelectorAll("input").forEach(input => input.value = "");
      newBlock.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

      container.insertBefore(newBlock, container.lastElementChild);
    });

    deleteBtn.addEventListener("click", () => {
      const blocks = container.querySelectorAll(".other-income-block");
      if (blocks.length > 1) {
        blocks[blocks.length - 1].remove();
      }
    });
  });
</script>
