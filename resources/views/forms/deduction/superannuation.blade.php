<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Personal Superannuation Contributions</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="choosing-business-type-text">Number of funds</label>
      <select name="number_of_funds" class="form-control border-dark">
        <option value="">Choose</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </div>
  </div>

  <div class="grin_box_border p-3 mb-3">
    <div class="col-md-6">
        <label class="choosing-business-type-text d-block mb-2">
      I confirm that I advised my fund(s) that I will claim this tax deduction, and I received confirmation from the fund(s):
    </label>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="confirmation" id="confirmation_yes" value="yes">
      <label class="form-check-label custom-label" for="confirmation_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="confirmation" id="confirmation_no" value="no">
      <label class="form-check-label custom-label" for="confirmation_no">No</label>
    </div>
    </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="choosing-business-type-text">Full name of fund</label>
      <input type="text" name="fund_name" class="form-control border-dark" placeholder="Name">
    </div>

    <div class="col-md-6 mb-3">
      <label class="choosing-business-type-text">Account Number</label>
      <input type="text" name="account_number" class="form-control border-dark" placeholder="0">
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="choosing-business-type-text">Amount of Deduction Claimed</label>
      <input type="text" name="deduction_amount" class="form-control border-dark" placeholder="00.00$">
    </div>
  </div>
  <div class="row">

    <div class="col-md-6 mb-3">
      <label class="choosing-business-type-text">Super Fund's ABN</label>
      <input type="text" name="super_fund_abn" class="form-control border-dark" placeholder="Name">
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-4">
      <label class="choosing-business-type-text">Day</label>
      <select name="super_day" class="form-control border-dark">
        <option value="">Day</option>
        @for ($i = 1; $i <= 31; $i++)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>

    <div class="col-md-4">
      <label class="choosing-business-type-text">Month</label>
      <select name="super_month" class="form-control border-dark">
        <option value="">Month</option>
        @for ($i = 1; $i <= 12; $i++)
          <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
        @endfor
      </select>
    </div>

    <div class="col-md-4">
      <label class="choosing-business-type-text">Year</label>
      <select name="super_year" class="form-control border-dark">
        <option value="">Year</option>
        @for ($i = date('Y'); $i >= 1990; $i--)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
  </div>
  
  </div>
</form>
