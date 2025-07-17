<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Sun Protection</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <p class="choosing-business-type-text">
    If you are required to do your work outdoors, then you can claim the cost of sunscreen, sunglasses and sun-protection clothing like hats.
  </p>
  <div class="grin_box_border p-3 mb-3">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Describe this item (eg. “sunnies and wide rimmed hat for paving work”)
        </label>
        <input type="text" class="form-control" name="sun_description" placeholder="...">
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Total cost of sun protection items</label>
        <input type="text" class="form-control" name="sun_cost" placeholder="00.00$">
      </div>
    </div>
  </div>

  <div class="row mb-3 align-items-end">
    <p class="choosing-business-type-text">
      Attach a simple breakdown of your expenses (optional)
    </p>

    <div class="col-md-6 mb-3">
      <input type="file" name="sun_file" id="sunFileInput" class="d-none">
      <button type="button" class="btn btn_add" id="triggerSunFile">
        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
        Choose file
      </button>
    </div>

    <div class="col-md-6 mb-3">
      <p id="sunFileName" class="choosing-business-type-text text-muted mb-0">
        No file chosen
      </p>
    </div>
  </div>
</form>
<script>
    // File input handler for Sun Protection
const sunFileInput = document.getElementById("sunFileInput");
const triggerSunFile = document.getElementById("triggerSunFile");
const sunFileName = document.getElementById("sunFileName");

if (sunFileInput && triggerSunFile && sunFileName) {
  triggerSunFile.addEventListener("click", () => sunFileInput.click());

  sunFileInput.addEventListener("change", () => {
    sunFileName.textContent = sunFileInput.files.length
      ? sunFileInput.files[0].name
      : "No file chosen";
  });
}
</script>