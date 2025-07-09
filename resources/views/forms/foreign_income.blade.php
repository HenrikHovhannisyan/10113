    <form>
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Foreign Source Income</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
      </div>

      <!-- Question 1 -->
      <p class="choosing-business-type-text">
        Foreign Income - Income from foreign assets or investments
      </p>
      <div class="grin_box_border mb-4">
        <div class="row">
          <div class="col-md-6">
            <p class="choosing-business-type-text">
              During the year did you own, or have an interest in, assets
              located outside Australia which had a total value of AUD $50,000
              or more?
            </p>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio"
                type="radio"
                name="assets_interest"
                id="assetsInterestYes"
                value="yes"
              />
              <label
                class="form-check-label custom-label"
                for="assetsInterestYes"
                >Yes</label
              >
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio"
                type="radio"
                name="assets_interest"
                id="assetsInterestNo"
                value="no"
              />
              <label
                class="form-check-label custom-label"
                for="assetsInterestNo"
                >No</label
              >
            </div>
          </div>
        </div>

        <!-- Assets income -->
        <div class="row">
          <div class="col-md-6">
            <p class="choosing-business-type-text mt-3">
              Did you receive any income from foreign assets, investments,
              rental property, or any other source?
            </p>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-yes"
                type="radio"
                name="income_foreign_sources"
                id="incomeForeignYes"
                value="yes"
              />
              <label
                class="form-check-label custom-label"
                for="incomeForeignYes"
                >Yes</label
              >
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-no"
                type="radio"
                name="income_foreign_sources"
                id="incomeForeignNo"
                value="no"
              />
              <label class="form-check-label custom-label" for="incomeForeignNo"
                >No</label
              >
            </div>

            <div
              class="foreign-details"
              style="display:none; margin-top: 15px;"
            >
              <div class="row asset-entry">
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="foreignIncomeType"
                    >Type of foreign income</label
                  >
                  <select
                    class="form-select foreign-income-type"
                    name="foreign_income_type[]"
                  >
                    <option value="">Choose</option>
                        <option value="rental">Rental Property</option>
                        <option value="investment">Financial Investment</option>
                        <option value="other">Other (please specify)</option>
                  </select>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6 mb-3 foreign-income-other-block" style="display: none;">
                    <label class="choosing-business-type-text">
                        Other (please specify)
                    </label>
                    <input
                        type="text"
                        class="form-control foreign-income-other"
                        name="foreign_income_other[]"
                        placeholder="Specify type..."
                    />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="deductibleExpenses"
                    >Deductible expenses</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="deductible_expenses[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label class="choosing-business-type-text" for="grossAmount"
                    >Gross amount (income) received</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="gross_amount[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="foreignTaxPaid"
                    >Foreign tax paid</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="foreign_tax_paid[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3 nz-franking-credit-block" style="display: none;">
                    <label class="choosing-business-type-text">
                        Australian franking credits from a NZ franking company
                    </label>
                    <input
                        type="number"
                        step="0.01"
                        class="form-control"
                        name="nz_franking_credit[]"
                        placeholder="00.00$"
                    />
                </div>

                <div class="col-12 mb-3">
                  <button type="button" class="btn btn_delete_asset btn_delete">
                    Delete asset
                  </button>
                </div>
              </div>

              <div class="col mb-3">
                <button type="button" class="btn btn_add_asset btn_add">
                  <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Add
                  another asset
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Question 2 -->
      <p class="choosing-business-type-text">
        Foreign Income - Income from foreign pensions and annuities
      </p>
      <div class="grin_box_border mb-4">
        <div class="row">
          <div class="col-md-6">
            <p class="choosing-business-type-text">
              Did you receive any income from foreign pensions or annuities?
            </p>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio pension-yes"
                type="radio"
                name="income_foreign_pensions"
                id="incomePensionsYes"
                value="yes"
              />
              <label
                class="form-check-label custom-label"
                for="incomePensionsYes"
                >Yes</label
              >
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio pension-no"
                type="radio"
                name="income_foreign_pensions"
                id="incomePensionsNo"
                value="no"
              />
              <label
                class="form-check-label custom-label"
                for="incomePensionsNo"
                >No</label
              >
            </div>

            <div
              class="foreign-details foreign-pensions-details"
              style="display:none; margin-top: 15px;"
            >
              <div class="row pension-entry">
                <div class="col-md-6 mb-3">
                  <label class="choosing-business-type-text" for="pensionType"
                    >Describe type of pension or annuity</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="pension_type[]"
                    placeholder="Lifetime annuities"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="grossAmountPension"
                    >Gross amount (income) received</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="gross_amount_pension[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="deductibleExpensesPension"
                    >Deductible expenses</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="deductible_expenses_pension[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="undeductedPurchasePrice"
                    >Undeducted purchase price</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="undeducted_purchase_price[]"
                    placeholder="00.00$"
                  />
                </div>
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="foreignTaxPaidPension"
                    >Foreign tax paid</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="foreign_tax_paid_pension[]"
                    placeholder="00.00$"
                  />
                </div>

                <div class="col-12 mb-3">
                  <button
                    type="button"
                    class="btn btn_delete_pension btn_delete"
                  >
                    Delete pension or annuity
                  </button>
                </div>
              </div>

              <div class="col mb-3">
                <button type="button" class="btn btn_add_pension btn-add">
                  <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Add
                  another pension or annuity
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Question 3 -->
      <p class="choosing-business-type-text">
        Foreign Income - Income from foreign employment
      </p>
      <div class="grin_box_border mb-4">
        <div class="row">
          <div class="col-md-6">
            <p class="choosing-business-type-text">
              Did you receive any income from employment in a foreign country?
            </p>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-yes"
                type="radio"
                name="income_foreign_employment_1"
                id="incomeEmployment1Yes"
                value="yes"
              />
              <label
                class="form-check-label custom-label"
                for="incomeEmployment1Yes"
                >Yes</label
              >
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-no"
                type="radio"
                name="income_foreign_employment_1"
                id="incomeEmployment1No"
                value="no"
              />
              <label
                class="form-check-label custom-label"
                for="incomeEmployment1No"
                >No</label
              >
            </div>

            <div class="foreign-details" style="display:none;">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="employmentGrossAmount"
                    >Gross amount (income) received</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="employment_gross_amount[]"
                    placeholder="00.00$"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label
                    class="choosing-business-type-text"
                    for="employmentDescription"
                  >
                    Please describe the type of income and how you earned it
                  </label>
                  <textarea
                    class="form-control"
                    name="employment_income_description[]"
                    rows="3"
                    placeholder="Description..."
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Question 4 -->
      <p class="choosing-business-type-text">
        Foreign Income - Non-resident foreign income
      </p>
      <div class="grin_box_border mb-4">
        <div class="row">
          <div class="col-md-6">
            <p class="choosing-business-type-text">
              Did you receive any income from employment in a foreign country?
            </p>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-yes"
                type="radio"
                name="income_foreign_employment_2"
                id="incomeEmployment2Yes"
                value="yes"
              />
              <label
                class="form-check-label custom-label"
                for="incomeEmployment2Yes"
                >Yes</label
              >
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input custom-radio foreign-no"
                type="radio"
                name="income_foreign_employment_2"
                id="incomeEmployment2No"
                value="no"
              />
              <label
                class="form-check-label custom-label"
                for="incomeEmployment2No"
                >No</label
              >
            </div>

            <div
              class="foreign-details employment-details"
              style="display:none; margin-top: 20px;"
            >
              <div class="row">
                <div class="col-12 mb-3">
                  <label class="choosing-business-type-text">
                    Were you non-resident for part or all of the tax year from 1
                    July 2024 to 30 June 2025? </label
                  ><br />
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input custom-radio non-resident-yes"
                      type="radio"
                      name="non_resident_status"
                      id="nonResidentYes"
                      value="yes"
                    />
                    <label
                      class="form-check-label custom-label"
                      for="nonResidentYes"
                      >Yes</label
                    >
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input custom-radio non-resident-no"
                      type="radio"
                      name="non_resident_status"
                      id="nonResidentNo"
                      value="no"
                    />
                    <label
                      class="form-check-label custom-label"
                      for="nonResidentNo"
                      >No</label
                    >
                  </div>
                </div>

                <div class="col-12 mb-3 help-debt-block" style="display:none;">
                  <label class="choosing-business-type-text">
                    Did you have a HELP or AASL (previously known as TSL) debt
                    on 1 June 2025? </label
                  ><br />
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input custom-radio"
                      type="radio"
                      name="help_debt"
                      id="helpDebtYes"
                      value="yes"
                    />
                    <label
                      class="form-check-label custom-label"
                      for="helpDebtYes"
                      >Yes</label
                    >
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input custom-radio"
                      type="radio"
                      name="help_debt"
                      id="helpDebtNo"
                      value="no"
                    />
                    <label
                      class="form-check-label custom-label"
                      for="helpDebtNo"
                      >No</label
                    >
                  </div>
                </div>

                <div class="help-related-fields" style="display: none;">
                  <div class="row">
                    <div class="col-md-6 mb-3 pt-0 pt-md-4">
                      <label class="choosing-business-type-text"
                        >Country you earned foreign income in</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="foreign_income_country[]"
                        placeholder="Country"
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="choosing-business-type-text"
                        >Occupation while earning foreign income</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        name="foreign_income_occupation[]"
                        placeholder="Occupation"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="choosing-business-type-text"
                        >Gross amount foreign income received</label
                      >
                      <input
                        type="number"
                        step="0.01"
                        class="form-control"
                        name="foreign_income_gross_amount[]"
                        placeholder="00.00$"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const toggleBlockDisplay = (condition, block) => {
      if (block) block.style.display = condition ? "block" : "none";
    };

    document.querySelectorAll(".grin_box_border").forEach(block => {
      const yes = block.querySelector(".foreign-yes, .pension-yes");
      const no = block.querySelector(".foreign-no, .pension-no");
      const details = block.querySelector(".foreign-details");

      if (yes && no && details) {
        const toggle = () => toggleBlockDisplay(yes.checked, details);
        yes.addEventListener("change", toggle);
        no.addEventListener("change", toggle);
        toggle();
      }
    });

    document.querySelectorAll(".foreign-details").forEach(details => {
      const addBtn = details.querySelector(".btn_add_asset");
      if (!addBtn) return;

      const initAssetEntry = entry => {
        const select = entry.querySelector(".foreign-income-type");
        const franking = details.querySelector(".nz-franking-credit-block");
        const otherInput = details.querySelector(".foreign-income-other-block");
        const deleteBtn = entry.querySelector(".btn_delete_asset");

        if (select) {
          select.addEventListener("change", () => {
            const val = select.value;
            toggleBlockDisplay(val === "investment", franking);
            toggleBlockDisplay(val === "other", otherInput);

            if (val !== "investment" && franking)
              franking.querySelector("input").value = "";
            if (val !== "other" && otherInput)
              otherInput.querySelector("input").value = "";
          });
          select.dispatchEvent(new Event("change"));
        }

        if (deleteBtn) {
          deleteBtn.addEventListener("click", () => {
            const entries = details.querySelectorAll(".asset-entry");
            if (entries.length > 1) entry.remove();
            else alert("You must keep at least one asset entry.");
          });
        }
      };

      details.querySelectorAll(".asset-entry").forEach(initAssetEntry);

      addBtn.addEventListener("click", () => {
        const entry = details.querySelector(".asset-entry");
        const clone = entry.cloneNode(true);
        clone.querySelectorAll("input, select").forEach(el => {
          if (el.tagName === "SELECT") el.selectedIndex = 0;
          else el.value = "";
        });
        const franking = clone.querySelector(".nz-franking-credit-block");
        if (franking) franking.style.display = "none";
        details.insertBefore(clone, addBtn.parentElement);
        initAssetEntry(clone);
      });
    });

    const pensions = document.querySelector(".foreign-pensions-details");
    if (pensions) {
      const addBtn = pensions.querySelector(".btn_add_pension");

      const initPensionEntry = entry => {
        const deleteBtn = entry.querySelector(".btn_delete_pension");
        if (deleteBtn) {
          deleteBtn.addEventListener("click", () => {
            const entries = pensions.querySelectorAll(".pension-entry");
            if (entries.length > 1) entry.remove();
            else alert("You must keep at least one pension or annuity entry.");
          });
        }
      };

      pensions.querySelectorAll(".pension-entry").forEach(initPensionEntry);

      addBtn?.addEventListener("click", () => {
        const entry = pensions.querySelector(".pension-entry");
        const clone = entry.cloneNode(true);
        clone.querySelectorAll("input").forEach(i => i.value = "");
        pensions.insertBefore(clone, addBtn.parentElement);
        initPensionEntry(clone);
      });
    }

    const empYes = document.getElementById("incomeEmployment2Yes");
    const empNo = document.getElementById("incomeEmployment2No");
    const details = empYes?.closest(".grin_box_border")?.querySelector(".foreign-details");
    const helpDebtBlock = document.querySelector(".help-debt-block");

    const toggleEmployment = () => toggleBlockDisplay(empYes.checked, details);
    empYes?.addEventListener("change", toggleEmployment);
    empNo?.addEventListener("change", toggleEmployment);
    toggleEmployment();

    const resYes = document.getElementById("nonResidentYes");
    const resNo = document.getElementById("nonResidentNo");
    const helpFields = document.querySelector(".help-related-fields");

    const toggleHelpDebt = () => toggleBlockDisplay(resYes.checked, helpDebtBlock);
    const toggleHelpFields = () => toggleBlockDisplay(
      document.getElementById("helpDebtYes")?.checked,
      helpFields
    );

    resYes?.addEventListener("change", toggleHelpDebt);
    resNo?.addEventListener("change", toggleHelpDebt);
    toggleHelpDebt();

    document.getElementById("helpDebtYes")?.addEventListener("change", toggleHelpFields);
    document.getElementById("helpDebtNo")?.addEventListener("change", toggleHelpFields);
    toggleHelpFields();
  });
</script>

