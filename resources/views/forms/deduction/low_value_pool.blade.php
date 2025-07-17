<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Low Value Pool Deduction</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border p-3 mb-3">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Low value pool deductions relating to financial investments
        </label>
        <input type="text" class="form-control border-dark" name="lvp_financial" placeholder="00.00$">
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Low value pool deductions relating to rental properties
        </label>
        <input type="text" class="form-control border-dark" name="lvp_rental" placeholder="00.00$">
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          Other low value pool deductions
        </label>
        <input type="text" class="form-control border-dark" name="lvp_other" placeholder="00.00$">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="choosing-business-type-text">Total low value pool:</label>
      <p class="choosing-business-type-text text-secondary" id="lvp_total">00.00$</p>
    </div>
  </div>
</form>
