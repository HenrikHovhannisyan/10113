<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Home Office Occupancy</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border p-3 mb-3">
    <div class="mb-3">
      <label class="choosing-business-type-text">Does your employer provide an office or work area for you?</label>
      <div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="employer_office" id="employerOfficeYes" value="yes">
          <label class="form-check-label custom-label" for="employerOfficeYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="employer_office" id="employerOfficeNo" value="no">
          <label class="form-check-label custom-label" for="employerOfficeNo">No</label>
        </div>
      </div>
    </div>

    <div id="secondQuestion" class="mb-3 d-none">
      <label class="choosing-business-type-text">Do you have a dedicated home office space that is considered to be your “place of business”?</label>
      <div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="dedicated_office" id="dedicatedOfficeYes" value="yes">
          <label class="form-check-label custom-label" for="dedicatedOfficeYes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input custom-radio" type="radio" name="dedicated_office" id="dedicatedOfficeNo" value="no">
          <label class="form-check-label custom-label" for="dedicatedOfficeNo">No</label>
        </div>
      </div>
    </div>

    <div id="dedicatedDetails" class="d-none">
      <div class="mb-3">
        <label class="choosing-business-type-text">
          Please list the details and amounts of any of these expenses for the tax year: <br>
          <small class="text-muted">(Rent Paid or Mortgage interest, Council rates, Land tax, House insurance)</small><br>
          Adjust the total amount to reflect your share of the expense only.
        </label>
        <textarea class="form-control border-dark" name="office_expenses" rows="4" placeholder="Describe the expenses..."></textarea>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="choosing-business-type-text">What is the total area of the inside of your home? (in square metres)</label>
          <input type="number" class="form-control border-dark" name="total_home_area" placeholder="...">
        </div>
        <div class="col-md-6">
          <label class="choosing-business-type-text">What is the total area of your home office or work area? (in square metres)</label>
          <input type="number" class="form-control border-dark" name="office_area" placeholder="...">
        </div>
      </div>

      <div class="mb-3">
        <label class="choosing-business-type-text">Did your employer already pay or reimburse you for any of the items above?</label>
        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="employer_reimbursed" id="employerReimbursedYes" value="yes">
            <label class="form-check-label custom-label" for="employerReimbursedYes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="employer_reimbursed" id="employerReimbursedNo" value="no">
            <label class="form-check-label custom-label" for="employerReimbursedNo">No</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const firstYes = document.getElementById("employerOfficeYes");
    const firstNo = document.getElementById("employerOfficeNo");
    const secondBlock = document.getElementById("secondQuestion");

    const secondYes = document.getElementById("dedicatedOfficeYes");
    const secondNo = document.getElementById("dedicatedOfficeNo");
    const detailsBlock = document.getElementById("dedicatedDetails");

    function handleFirstQuestion() {
      if (firstYes.checked) {
        secondBlock.classList.remove("d-none");
      } else {
        secondBlock.classList.add("d-none");
        detailsBlock.classList.add("d-none");
      }
    }

    function handleSecondQuestion() {
      if (secondYes.checked) {
        detailsBlock.classList.remove("d-none");
      } else {
        detailsBlock.classList.add("d-none");
      }
    }

    firstYes.addEventListener("change", handleFirstQuestion);
    firstNo.addEventListener("change", handleFirstQuestion);
    secondYes.addEventListener("change", handleSecondQuestion);
    secondNo.addEventListener("change", handleSecondQuestion);
  });
</script>
