<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Internet Access</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>
    <p class="choosing-business-type-text">
        If you use your internet connection for work purposes, then you can claim part of the cost as a tax deduction.
    </p>
  <div class="grin_box_border mb-3">
    <div class="row">
        <p class="choosing-business-type-text">
            <strong>Important:</strong> To claim internet, you must have:
        </p>
        <p class="choosing-business-type-text ms-3">
            A copy of your internet bills AND a record that represents your typical work-related internet use for a continuous 4-week period (e.g. diary entries, timesheets, logbook)
        </p>
        <p class="choosing-business-type-text">
            <strong>OR</strong>
        </p>
        <p class="choosing-business-type-text ms-3">
            A record of the number of hours that you worked at home each day during the year (e.g. diary entries, timesheets, logbook).
        </p>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Why do you use internet for work? (e.g. “I work from home 2 days a week”)</label>
        <input type="text" class="form-control border-dark" id="internetReason" name="internet_reason" placeholder='...'>
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">What % of your internet use is directly related to your work? (e.g. 20%)</label>
        <input type="text" class="form-control border-dark" id="internetPercentage" name="internet_percentage" placeholder="0%">
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Total of your internet charges for the year (Add up your internet provider bills for July 2024 - June 2025)</label>
        <input type="number" step="0.01" class="form-control border-dark" id="internetTotal" name="internet_total" placeholder="00.00$">
      </div>
    </div>
    <div class="col-12">
      <label class="choosing-business-type-text">Estimated final amount of your claim:</label>
      <p class="choosing-business-type-text text-secondary" id="internetClaim">00.00$</p>
    </div>
  </div>

</form>
