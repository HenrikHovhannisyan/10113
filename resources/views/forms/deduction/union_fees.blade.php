<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Union Fees</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border p-3 mb-3">
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="choosing-business-type-text">Total union fees paid</label>
        <input type="text" name="union_fees" class="form-control border-dark" placeholder="00.00$">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="choosing-business-type-text">
          What sort of records or evidence do you have for this expense? <br>
          <small class="text-muted">(e.g. an invoice or receipt)</small>
        </label>
        <select name="evidence_type" class="form-control border-dark">
          <option value="">Choose</option>
          <option value="payg">PAYG</option>
          <option value="invoice">Invoice / receipt</option>
          <option value="actual">Actual recorded cost</option>
        </select>
      </div>
    </div>
  </div>

<div class="row mb-3 align-items-end">
  <p class="choosing-business-type-text">
    Attach a simple breakdown of your expenses <span class="text-muted">(optional)</span>
  </p>

  <div class="col-md-6 mb-3">
    <input type="file" name="edu_file" id="eduFileInput" class="d-none">
    <button type="button" class="btn btn_add" id="triggerEduFile">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
      Choose file
    </button>
  </div>

  <div class="col-md-6 mb-3">
    <p id="eduFileName" class="choosing-business-type-text text-muted mb-0">
      No file chosen
    </p>
  </div>
</div>
</form>

<script>
    // File input handler
const eduFileInput = document.getElementById("eduFileInput");
const triggerEduFile = document.getElementById("triggerEduFile");
const eduFileName = document.getElementById("eduFileName");

if (eduFileInput && triggerEduFile && eduFileName) {
  triggerEduFile.addEventListener("click", () => eduFileInput.click());

  eduFileInput.addEventListener("change", () => {
    eduFileName.textContent = eduFileInput.files.length
      ? eduFileInput.files[0].name
      : "No file chosen";
  });
}

</script>
