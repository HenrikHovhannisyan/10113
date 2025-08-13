<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Medicare Levy Reduction Or Exemption</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border mt-4 mb-5">
<div class="row">
      <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Number of dependent children and students</p>
    <input type="number" name="dependent_children" class="form-control border-dark" min="0" value="0">
  </div>

  <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Number of days full levy exemption</p>
    <input type="number" name="full_levy_days" class="form-control border-dark" min="0" value="0">
  </div>
</div>

  <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Number of days full levy exemption action code</p>
    <select name="full_levy_action_code" class="form-control border-dark">
      <option value="">Choose</option>
      <option value="C">C: HIC Exempt</option>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Number of days half levy exemption</p>
    <input type="number" name="half_levy_days" class="form-control border-dark" min="0" value="0">
  </div>

    <div class="col-md-6 mb-3">
    <label class="choosing-business-type-text d-block mb-2">
        Attach your Medicare Levy Exemption Certificate (if you have one)
    </label>
    <input type="file" name="medicare_certificate" id="medicare_certificate" class="d-none" />
    <button type="button" class="btn btn_add" id="medicare_certificate_trigger">
        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Choose file
    </button>
    <p id="medicare_certificate_name" class="choosing-business-type-text text-muted mb-0 mt-2">No file chosen</p>
    </div>
</div>
</section>

<script>
  const medicareInput = document.getElementById("medicare_certificate");
  const medicareTrigger = document.getElementById("medicare_certificate_trigger");
  const medicareFileNameDisplay = document.getElementById("medicare_certificate_name");

  medicareTrigger.addEventListener("click", () => medicareInput.click());

  medicareInput.addEventListener("change", () => {
    medicareFileNameDisplay.textContent = medicareInput.files[0]?.name || "No file chosen";
  });
</script>
