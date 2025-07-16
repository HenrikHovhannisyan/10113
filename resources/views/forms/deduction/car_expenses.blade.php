<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Car expenses + parking + tolls</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <p class="choosing-business-type-text">
    Enter car-related expenses for work. This excludes travel to and from work unless carrying heavy tools.
  </p>

  <div class="grin_box_border">
    <p class="choosing-business-type-text">
      If you use multiple vehicles, enter each one separately. Use the buttons below to add or remove vehicles.
    </p>

    <div>
      <p class="choosing-business-type-text">Do you use your motor vehicle(s) for work-related travel?</p>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio vehicle-use" type="radio" name="vehicle_use" id="vehicleUseYes" value="yes">
        <label class="form-check-label custom-label" for="vehicleUseYes">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input custom-radio vehicle-use" type="radio" name="vehicle_use" id="vehicleUseNo" value="no">
        <label class="form-check-label custom-label" for="vehicleUseNo">No</label>
      </div>
    </div>

    <div class="vehicle-extra-details mt-3" style="display: none;">
      <div id="vehicleContainer">
        <!-- Dynamic vehicle blocks inserted here -->
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <button type="button" class="btn btn_add btn_add_vehicle">
            <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another vehicle
          </button>
          <button type="button" class="btn btn_delete btn_delete_vehicle">
            Delete vehicle
          </button>
        </div>
      </div>
    </div>
  </div>

  <p class="choosing-business-type-text mt-4">Parking & Tolls</p>

  <div class="grin_box_border">
    <div class="row">
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Total cost of parking</p>
        <input type="number" name="parking_cost" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Total cost of tolls</p>
        <input type="number" name="tolls_cost" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-12 mb-3">
        <p class="choosing-business-type-text">Do you have receipts or logs for all parking and tolls claimed?</p>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="has_receipts" id="hasReceiptsYes" value="yes">
          <label class="form-check-label custom-label" for="hasReceiptsYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="has_receipts" id="hasReceiptsNo" value="no">
          <label class="form-check-label custom-label" for="hasReceiptsNo">No</label>
        </div>
      </div>

      <div class="col-12 mb-3 mt-4">
        <p class="choosing-business-type-text">Total parking and tolls:</p>
        <p class="choosing-business-type-text text-secondary" id="totalParkingTolls">00.00$</p>
      </div>
    </div>
  </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const vehicleRadios = document.querySelectorAll('input[name="vehicle_use"]');
  const extraDetails = document.querySelector(".vehicle-extra-details");
  const vehicleContainer = document.getElementById("vehicleContainer");
  const addVehicleBtn = document.querySelector(".btn_add_vehicle");
  const deleteVehicleBtn = document.querySelector(".btn_delete_vehicle");

  function toggleVehicleBlock() {
    const selected = document.querySelector('input[name="vehicle_use"]:checked');
    extraDetails.style.display = (selected && selected.value === "yes") ? "block" : "none";
  }

  vehicleRadios.forEach(radio => radio.addEventListener("change", toggleVehicleBlock));
  toggleVehicleBlock();

  function createDateSelects(namePrefix, index) {
    const daysOptions = Array.from({length:31}, (_,i) => `<option value="${i+1}">${i+1}</option>`).join('');
    const monthsNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthsOptions = monthsNames.map((m,i) => `<option value="${i+1}">${m}</option>`).join('');
    const currentYear = new Date().getFullYear();
    const yearsOptions = [];
    for(let y = currentYear; y >= 1990; y--) {
      yearsOptions.push(`<option value="${y}">${y}</option>`);
    }

    return `
      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Day</label>
          <select name="${namePrefix}_day_${index}" class="form-control border-dark">
            <option value="">Day</option>
            ${daysOptions}
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Month</label>
          <select name="${namePrefix}_month_${index}" class="form-control border-dark">
            <option value="">Month</option>
            ${monthsOptions}
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Year</label>
          <select name="${namePrefix}_year_${index}" class="form-control border-dark">
            <option value="">Year</option>
            ${yearsOptions.join('')}
          </select>
        </div>
      </div>
    `;
  }

  function createVehicleBlock(index) {
    return `
      <section class="vehicle-block">
        <div class="row">
          <div class="col-md-12 mb-3">
            <p class="choosing-business-type-text">Is the vehicle registered in your name (do you own the vehicle)?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input custom-radio" id="registeredOwnerYes_${index}" type="radio" name="registered_owner_${index}" value="yes">
              <label class="form-check-label custom-label" for="registeredOwnerYes_${index}">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input custom-radio" id="registeredOwnerNo_${index}" type="radio" name="registered_owner_${index}" value="no">
              <label class="form-check-label custom-label" for="registeredOwnerNo_${index}">No</label>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <p class="choosing-business-type-text">In a few words, why do you use your car for work?</p>
            <input type="text" name="car_usage_reason_${index}" class="form-control border-dark" placeholder="...">
          </div>

          <div class="col-md-6 mb-3">
            <p class="choosing-business-type-text">Number of kilometres travelled for work</p>
            <input type="text" name="work_kilometers_${index}" class="form-control border-dark" placeholder="...">
          </div>

          <div class="col-md-12 mb-3">
            <p class="choosing-business-type-text">Did you record all your trips in a car logbook for 12 continuous weeks (1 time during the past 5 years)?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input logbook-radio custom-radio" id="logbookYes_${index}" type="radio" name="has_logbook_${index}" value="yes">
              <label class="form-check-label custom-label" for="logbookYes_${index}">Yes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input logbook-radio custom-radio" id="logbookNo_${index}" type="radio" name="has_logbook_${index}" value="no">
              <label class="form-check-label custom-label" for="logbookNo_${index}">No</label>
            </div>
          </div>

          <div class="col-md-12 mb-3 logbook-extra" style="display: none;">
            <div class="row gx-3 gy-2">
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="startOdometer_${index}">Start of logbook period odometer reading</label>
                <input type="number" id="startOdometer_${index}" name="start_odometer_${index}" class="form-control border-dark" placeholder="...">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="endOdometer_${index}">End of logbook period odometer reading</label>
                <input type="number" id="endOdometer_${index}" name="end_odometer_${index}" class="form-control border-dark" placeholder="...">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="totalWorkKilometers_${index}">Total number of work related kilometres in logbook</label>
                <input type="number" id="totalWorkKilometers_${index}" name="total_work_kilometers_${index}" class="form-control border-dark" placeholder="...">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="fuelReceipts_${index}">Total of fuel receipts expense for the year</label>
                <input type="number" step="0.01" id="fuelReceipts_${index}" name="fuel_receipts_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="registrationExpense_${index}">Registration expense for the year</label>
                <input type="number" step="0.01" id="registrationExpense_${index}" name="registration_expense_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="serviceExpenses_${index}">Service expenses for the year</label>
                <input type="number" step="0.01" id="serviceExpenses_${index}" name="service_expenses_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="insuranceExpenses_${index}">Insurance expenses for the year</label>
                <input type="number" step="0.01" id="insuranceExpenses_${index}" name="insurance_expenses_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>
              <div class="col-md-6">
                <label class="choosing-business-type-text" for="otherVehicleExpenses_${index}">Other vehicle expenses for the year</label>
                <input type="number" step="0.01" id="otherVehicleExpenses_${index}" name="other_vehicle_expenses_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>

              <div class="col-md-6 mt-3">
                <label class="choosing-business-type-text" for="purchaseType_${index}">Did you buy the vehicle outright, borrow money to buy it, take out a hire purchase or is it under a lease agreement?</label>
                <select id="purchaseType_${index}" name="purchase_type_${index}" class="form-select border-dark">
                  <option value="">Choose</option>
                  <option value="purchased_outright">Purchased outright</option>
                  <option value="borrowed_or_hire_purchase">Borrowed money or hire purchase</option>
                  <option value="lease_agreement">Lease agreement</option>
                </select>
              </div>

              <div class="purchase-details purchase-purchased_outright mt-3" style="display:none;">
                <label class="choosing-business-type-text" for="purchaseDate_${index}_outright">Purchase date of vehicle</label>
                ${createDateSelects('purchase_date_outright', index)}
                <label class="choosing-business-type-text mt-2" for="purchasePrice_${index}_outright">Purchase price of vehicle</label>
                <input type="number" step="0.01" id="purchasePrice_${index}_outright" name="purchase_price_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>

              <div class="purchase-details purchase-borrowed_or_hire_purchase mt-3" style="display:none;">
                <label class="choosing-business-type-text" for="purchaseDate_${index}_borrowed">Purchase date of vehicle</label>
                ${createDateSelects('purchase_date_borrowed', index)}
                <div class="row gx-2">
                  <div class="col-md-6">
                    <label class="choosing-business-type-text mt-2" for="purchasePrice_${index}_borrowed">Purchase price of vehicle</label>
                    <input type="number" step="0.01" id="purchasePrice_${index}_borrowed" name="purchase_price_${index}" class="form-control border-dark" placeholder="00.00$">
                  </div>
                  <div class="col-md-6">
                    <label class="choosing-business-type-text mt-2" for="totalYearlyInterest_${index}">Total yearly interest paid</label>
                    <input type="number" step="0.01" id="totalYearlyInterest_${index}" name="total_yearly_interest_${index}" class="form-control border-dark" placeholder="00.00$">
                  </div>
                </div>
              </div>

              <div class="purchase-details purchase-lease_agreement mt-3" style="display:none;">
                <label class="choosing-business-type-text" for="purchaseDate_${index}_lease">Purchase date of vehicle</label>
                ${createDateSelects('purchase_date_lease', index)}
                <label class="choosing-business-type-text mt-2" for="totalYearlyInterest_${index}_lease">Total yearly interest paid</label>
                <input type="number" step="0.01" id="totalYearlyInterest_${index}_lease" name="total_yearly_interest_${index}" class="form-control border-dark" placeholder="00.00$">
              </div>
            </div>
          </div>
        </div>
      </section>
    `;
  }

  function initPurchaseTypeListeners() {
    const blocks = vehicleContainer.querySelectorAll(".vehicle-block");

    blocks.forEach(block => {
      const select = block.querySelector('select[name^="purchase_type_"]');
      if (!select) return;

      const showRelevantDetails = () => {
        const value = select.value;
        const detailsBlocks = block.querySelectorAll(".purchase-details");
        detailsBlocks.forEach(div => div.style.display = "none");
        if (!value) return;
        const toShow = block.querySelector(`.purchase-${value}`);
        if (toShow) toShow.style.display = "block";
      };

      select.addEventListener("change", showRelevantDetails);

      showRelevantDetails();
    });
  }

  function initLogbookListeners() {
    const blocks = vehicleContainer.querySelectorAll(".vehicle-block");
    blocks.forEach(block => {
      const radios = block.querySelectorAll(".logbook-radio");
      const logbookExtra = block.querySelector(".logbook-extra");
      if (!logbookExtra) return;

      const toggleLogbookExtra = () => {
        const selected = [...radios].find(r => r.checked);
        logbookExtra.style.display = selected && selected.value === "yes" ? "block" : "none";
      };

      radios.forEach(r => r.addEventListener("change", toggleLogbookExtra));
      toggleLogbookExtra();
    });
  }

  addVehicleBtn.addEventListener("click", () => {
    const index = vehicleContainer.querySelectorAll(".vehicle-block").length;
    vehicleContainer.insertAdjacentHTML("beforeend", createVehicleBlock(index));
    initLogbookListeners();
    initPurchaseTypeListeners();
  });

  deleteVehicleBtn.addEventListener("click", () => {
    const blocks = vehicleContainer.querySelectorAll(".vehicle-block");
    if (blocks.length > 1) blocks[blocks.length - 1].remove();
  });

  addVehicleBtn.click();
  initPurchaseTypeListeners();
});
</script>
