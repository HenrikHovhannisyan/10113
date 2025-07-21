<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Other Deductions</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text" for="income_protection">Income protection, sickness and accident insurance premiums</label>
            <input
            type="number"
            step="0.01"
            class="form-control border-dark"
            id="income_protection"
            name="income_protection"
            placeholder="00.00$"
            />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text" for="foreign_exchange_losses">Foreign exchange losses</label>
            <input
                type="number"
                step="0.01"
                class="form-control border-dark"
                id="foreign_exchange_losses"
                name="foreign_exchange_losses"
                placeholder="00.00$"
            />
        </div>
        <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text" for="other_expenses">Other expenses not listed elsewhere</label>
            <input
                type="number"
                step="0.01"
                class="form-control border-dark"
                id="other_expenses"
                name="other_expenses"
                placeholder="00.00$"
            />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text" for="other_expenses_description">Other expenses - please describe the other expenses in a few words</label>
            <input
                type="text"
                class="form-control border-dark"
                id="other_expenses_description"
                name="other_expenses_description"
                placeholder="..."
            />
        </div>
    </div>
  </div>
</form>
