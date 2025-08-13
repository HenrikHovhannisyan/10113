<section>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Rent Received</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <p class="choosing-business-type-text">
    Complete this section if you earned income from a rental property, or it
    was available to rent during the year. If you own more than one
    property, please enter each one separately.
  </p>
  <p class="choosing-business-type-text">
    Please enter the FULL amount of the income and expenses related to each
    property below. If your ownership is 50%, please still enter the total
    income and expenses for the property. We will automatically calculate
    your share for you.
  </p>

  <div class="grin_box_border mb-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Number of Rental Properties</label>
        <input
          type="number"
          name="rent[rental_property_count]"
          class="form-control border-dark"
          placeholder="1"
          value="{{ old('rent.rental_property_count', $incomes->rent['rental_property_count'] ?? '') }}"
        />
      </div>
    </div>
  </div>

  <p class="choosing-business-type-text"><strong>Rental Property 1</strong></p>
  <div class="grin_box_border mb-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Your percentage ownership of the property</label>
        <input
          type="number"
          name="rent[ownership_percentage]"
          class="form-control border-dark"
          placeholder="2"
          value="{{ old('rent.ownership_percentage', $incomes->rent['ownership_percentage'] ?? '') }}"
        />
      </div>
    </div>

    <div class="row">
      <p class="choosing-business-type-text"><strong>Property details</strong></p>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Street name and number</label>
        <input
          type="text"
          name="rent[street]"
          class="form-control border-dark"
          placeholder="123 Example Street"
          value="{{ old('rent.street', $incomes->rent['street'] ?? '') }}"
        />
      </div>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Suburb</label>
        <input
          type="text"
          name="rent[suburb]"
          class="form-control border-dark"
          placeholder="ANYTOWN"
          value="{{ old('rent.suburb', $incomes->rent['suburb'] ?? '') }}"
        />
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">State</label>
        <input
          type="text"
          name="rent[state]"
          class="form-control border-dark"
          placeholder="NSW"
          value="{{ old('rent.state', $incomes->rent['state'] ?? '') }}"
        />
      </div>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Postcode</label>
        <input
          type="text"
          name="rent[postcode]"
          class="form-control border-dark"
          placeholder="2000"
          value="{{ old('rent.postcode', $incomes->rent['postcode'] ?? '') }}"
        />
      </div>

      <div class="col-md-4">
        <select name="rent[start_day]" class="form-control border-dark">
          <option value="">Day</option>
          @for ($i = 1; $i <= 31; $i++)
            <option value="{{ $i }}" {{ old('rent.start_day', $incomes->rent['start_day'] ?? '') == $i ? 'selected' : '' }}>
              {{ $i }}
            </option>
          @endfor
        </select>
      </div>
      <div class="col-md-4">
        <select name="rent[start_month]" class="form-control border-dark">
          <option value="">Month</option>
          @for ($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}" {{ old('rent.start_month', $incomes->rent['start_month'] ?? '') == $i ? 'selected' : '' }}>
              {{ DateTime::createFromFormat('!m', $i)->format('F') }}
            </option>
          @endfor
        </select>
      </div>
      <div class="col-md-4">
        <select name="rent[start_year]" class="form-control border-dark">
          <option value="">Year</option>
          @for ($i = date('Y'); $i >= 1990; $i--)
            <option value="{{ $i }}" {{ old('rent.start_year', $incomes->rent['start_year'] ?? '') == $i ? 'selected' : '' }}>
              {{ $i }}
            </option>
          @endfor
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Number of weeks property was rented this tax year</label>
        <input
          type="number"
          name="rent[weeks_rented]"
          class="form-control border-dark"
          placeholder="1"
          value="{{ old('rent.weeks_rented', $incomes->rent['weeks_rented'] ?? '') }}"
        />
      </div>
    </div>

    <div class="row">
      <p class="choosing-business-type-text"><strong>Income details</strong></p>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Rental income</label>
        <input
          type="number"
          step="0.01"
          name="rent[rental_income]"
          class="form-control border-dark"
          placeholder="00.00$"
          value="{{ old('rent.rental_income', $incomes->rent['rental_income'] ?? '') }}"
        >
      </div>
      <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Other rental related income</label>
        <input
          type="number"
          step="0.01"
          name="rent[other_income]"
          class="form-control border-dark"
          placeholder="00.00$"
          value="{{ old('rent.other_income', $incomes->rent['other_income'] ?? '') }}"
        >
      </div>
    </div>

    <div class="row">
      <p class="choosing-business-type-text"><strong>Expense Details</strong></p>
      @php
        $expenseFields = ['council_rates','interest_loans','agent_fees','repairs','body_corp','water_charges','capital_allowance','capital_works','advertising','gardening','insurance','land_tax','legal_fees','pest_control','stationery','travel_expenses','sundry'];
      @endphp
      @foreach($expenseFields as $field)
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">{{ ucwords(str_replace('_',' ',$field)) }}</label>
          <input
            type="text"
            name="rent[{{ $field }}]"
            class="form-control border-dark"
            placeholder="00.00$"
            value="{{ old('rent.'.$field, $incomes->rent[$field] ?? '') }}"
          >
        </div>
      @endforeach
    </div>
  </div>

  <div class="col-12 mt-4 mb-3">
    <p class="choosing-business-type-text">Attach copy of interest statements. PnL’s for your rental property</p>
    <input type="file" name="rent[rent_file]" id="rentalFileInput" class="d-none">
    <button type="button" class="btn btn_add" id="triggerRentalFile">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Choose file
    </button>
    <p id="rentalSelectedFile" class="choosing-business-type-text text-muted mb-0 mt-2">
      {{ $incomes->rent['rent_file'] ?? 'No file chosen' }}
    </p>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const fileInput = document.getElementById("rentalFileInput");
  const trigger = document.getElementById("triggerRentalFile");
  const fileDisplay = document.getElementById("rentalSelectedFile");

  trigger.addEventListener("click", () => fileInput.click());
  fileInput.addEventListener("change", () => {
    fileDisplay.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : "No file chosen";
  });
});
</script>
