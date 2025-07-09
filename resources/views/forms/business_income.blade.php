<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Net Income Or Loss From Business</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <div class="grin_box_border mb-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net Income Or Loss From Business</p>
        <input type="number" step="0.01" name="net_business" class="form-control border-dark" placeholder="00.00$" />
      </div>
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Profit or Loss</p>
        <select name="net_business_type" class="form-control border-dark">
          <option value="">Choose</option>
          <option value="profit">Profit</option>
          <option value="loss">Loss</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net income or loss from carrying on a rental property business</p>
        <input type="number" step="0.01" name="rental_business" class="form-control border-dark" placeholder="00.00$" />
      </div>
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Profit or Loss</p>
        <select name="rental_business_type" class="form-control border-dark">
          <option value="">Choose</option>
          <option value="profit">Profit</option>
          <option value="loss">Loss</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Other income or loss relating to item 15</p>
        <input type="number" step="0.01" name="other_income_15" class="form-control border-dark" placeholder="00.00$" />
      </div>
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Profit or Loss</p>
        <select name="other_income_15_type" class="form-control border-dark">
          <option value="">Choose</option>
          <option value="profit">Profit</option>
          <option value="loss">Loss</option>
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net small business income</p>
        <input type="number" step="0.01" name="small_business_income" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net income/loss from business tax withheld voluntary agreement</p>
        <input type="number" step="0.01" name="tax_withheld_voluntary" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net income/loss from business tax withheld where Australian business number not quoted</p>
        <input type="number" step="0.01" name="tax_withheld_abn" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net income/loss from business tax withheld - foreign resident withholding (excluding capital gains)</p>
        <input type="number" step="0.01" name="foreign_withholding" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Net income/loss from business tax withheld - labour hire or other specified payments</p>
        <input type="number" step="0.01" name="labour_hire" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
  </div>
</form>
