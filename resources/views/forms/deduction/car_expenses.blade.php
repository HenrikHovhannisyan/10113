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
        <section class="vehicle-block">
          <div class="row">
            <div class="col-md-12 mb-3">
              <p class="choosing-business-type-text">Is the vehicle registered in your name (do you own the vehicle)?</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input custom-radio" id="registeredOwnerYes" type="radio" name="registered_owner[]" value="yes">
                <label class="form-check-label custom-label" for="registeredOwnerYes" >Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input custom-radio" id="registeredOwnerNo" type="radio" name="registered_owner[]" value="no">
                <label class="form-check-label custom-label" for="registeredOwnerNo" >No</label>
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <p class="choosing-business-type-text">In a few words, why do you use your car for work?</p>
              <input type="text" name="car_usage_reason[]" class="form-control border-dark" placeholder="...">
            </div>

            <div class="col-md-6 mb-3">
              <p class="choosing-business-type-text">Number of kilometres travelled for work</p>
              <input type="text" name="work_kilometers[]" class="form-control border-dark" placeholder="...">
            </div>

            <div class="col-md-6 mb-3">
              <p class="choosing-business-type-text">Did you record all your trips in a car logbook for 12 continuous weeks (1 time during the past 5 years)?</p>
              <div class="form-check form-check-inline">
                <input class="form-check-input custom-radio logbook-radio" id="logbookYes" type="radio" name="has_logbook[]" value="yes">
                <label class="form-check-label custom-label" for="logbookYes">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input custom-radio logbook-radio" id="logbookNo" type="radio" name="has_logbook[]" value="no">
                <label class="form-check-label custom-label" for="logbookNo">No</label>
              </div>
            </div>

            <div class="col-md-12 mb-3 logbook-extra" style="display: none;">
              <p class="choosing-business-type-text">Describe details from your logbook:</p>
              <input type="text" name="logbook_details[]" class="form-control border-dark" placeholder="Optional details">
            </div>
          </div>
        </section>
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
          <input class="form-check-input custom-radio" type="radio" name="has_receipts" value="yes">
          <label class="form-check-label custom-label">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="has_receipts" value="no">
          <label class="form-check-label custom-label">No</label>
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

  const toggleVehicleBlock = () => {
    const selected = document.querySelector('input[name="vehicle_use"]:checked');
    extraDetails.style.display = (selected && selected.value === "yes") ? "block" : "none";
  };

  vehicleRadios.forEach(radio => radio.addEventListener("change", toggleVehicleBlock));
  toggleVehicleBlock();

  const vehicleContainer = document.getElementById("vehicleContainer");
  const addVehicleBtn = document.querySelector(".btn_add_vehicle");
  const deleteVehicleBtn = document.querySelector(".btn_delete_vehicle");

  addVehicleBtn.addEventListener("click", () => {
    const blocks = vehicleContainer.querySelectorAll(".vehicle-block");
    const lastBlock = blocks[blocks.length - 1];
    const newBlock = lastBlock.cloneNode(true);

    newBlock.querySelectorAll("input").forEach(input => {
      input.value = "";
      input.checked = false;
    });

    vehicleContainer.appendChild(newBlock);
    initLogbookListeners();
  });

  deleteVehicleBtn.addEventListener("click", () => {
    const blocks = vehicleContainer.querySelectorAll(".vehicle-block");
    if (blocks.length > 1) {
      blocks[blocks.length - 1].remove();
    }
  });

  function initLogbookListeners() {
    const vehicleBlocks = vehicleContainer.querySelectorAll(".vehicle-block");

    vehicleBlocks.forEach(block => {
      const radios = block.querySelectorAll(".logbook-radio");
      const logbookExtra = block.querySelector(".logbook-extra");

      if (!logbookExtra) return;

      function toggleLogbookExtra() {
        const selected = [...radios].find(r => r.checked);
        logbookExtra.style.display = selected && selected.value === "yes" ? "block" : "none";
      }

      radios.forEach(radio => radio.addEventListener("change", toggleLogbookExtra));
      toggleLogbookExtra();
    });
  }

  initLogbookListeners();
});
</script>
