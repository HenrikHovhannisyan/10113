<form id="taxAffairsForm">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Cost of Managing Tax Affairs</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border p-3">
    <div class="row">
      <!-- Tax agent fees -->
      <div class="col-md-6 mb-3">
        <label for="tax_agent_fees" class="choosing-business-type-text">
          Tax agent fees and other expenses related to managing your tax affairs
        </label>
        <input type="text" id="tax_agent_fees" name="tax_agent_fees" class="form-control border-dark" placeholder="00.00$">
      </div>

      <!-- ATO interest -->
      <div class="col-md-6 mb-3">
        <label for="ato_interest" class="choosing-business-type-text">
          Interest charged by the ATO
        </label>
        <input type="text" id="ato_interest" name="ato_interest" class="form-control border-dark" placeholder="00.00$">
      </div>

      <!-- Legal costs -->
      <div class="col-md-6 mb-3">
        <label for="legal_costs" class="choosing-business-type-text">
          Legal or lawyer costs directly related to your tax affairs
        </label>
        <input type="text" id="legal_costs" name="legal_costs" class="form-control border-dark" placeholder="00.00$">
      </div>
    </div>
  </div>
</form>
