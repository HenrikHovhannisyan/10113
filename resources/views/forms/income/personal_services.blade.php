<section>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Personal Services Income</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <div class="grin_box_border mb-4">
    <p class="choosing-business-type-text">
        If you received more than one Employee Share Scheme, click the “Add another scheme” button to enter the details.
    </p>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          PSI tax withheld - voluntary agreement
        </label>
        <input
          type="number"
          step="0.01"
          name="psi_voluntary_agreement"
          class="form-control border-dark"
          placeholder="00.00$"
        />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          PSI tax withheld where Australian business number not quoted
        </label>
        <input
          type="number"
          step="0.01"
          name="psi_abn_not_quoted"
          class="form-control border-dark"
          placeholder="00.00$"
        />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">
          PSI Tax withheld - labour hire or other specified payments
        </label>
        <input
          type="number"
          step="0.01"
          name="psi_labour_hire"
          class="form-control border-dark"
          placeholder="00.00$"
        />
      </div>
    </div>
  </div>
</section>
