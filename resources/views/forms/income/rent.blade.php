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
            <label class="choosing-business-type-text"
              >Number of Rental Properties</label
            >
            <input
              type="number"
              name="rental_property_count"
              class="form-control border-dark"
              placeholder="1"
            />
          </div>
        </div>
      </div>

      <p class="choosing-business-type-text">
        <strong>Rental Property 1</strong>
      </p>
      <div class="grin_box_border mb-4">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Your percentage ownership of the property</label
            >
            <input
              type="number"
              name="ownership_percentage"
              class="form-control border-dark"
              placeholder="2"
            />
          </div>
        </div>
        <div class="row">
          <p class="choosing-business-type-text">
            <strong>Property details</strong>
          </p>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Street name and number</label
            >
            <input
              type="text"
              name="street"
              class="form-control border-dark"
              placeholder="123 Example Street"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Suburb</label>
            <input
              type="text"
              name="suburb"
              class="form-control border-dark"
              placeholder="ANYTOWN"
            />
          </div>

          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">State</label>
            <input
              type="text"
              name="state"
              class="form-control border-dark"
              placeholder="NSW"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Postcode</label>
            <input
              type="text"
              name="postcode"
              class="form-control border-dark"
              placeholder="2000"
            />
          </div>

          <div class="col-md-12 mb-3">
            <label class="choosing-business-type-text"
              >Date property first earned income</label
            >
            <div class="row">
              <div class="col-md-4">
                <select name="start_day" class="form-control border-dark">
                  <option value="">Day</option>
                  @for ($i = 1; $i <= 31; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>
              <div class="col-md-4">
                <select name="start_month" class="form-control border-dark">
                  <option value="">Month</option>
                  @for ($i = 1; $i <= 12; $i++)
                  <option value="{{ $i }}">
                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                  </option>
                  @endfor
                </select>
              </div>
              <div class="col-md-4">
                <select name="start_year" class="form-control border-dark">
                  <option value="">Year</option>
                  @for ($i = date('Y'); $i >= 1990; $i--)
                  <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Number of weeks property was rented this tax year</label
            >
            <input
              type="number"
              name="weeks_rented"
              class="form-control border-dark"
              placeholder="1"
            />
          </div>
        </div>
        <div class="row">
          <p class="choosing-business-type-text">
            <strong>Income details</strong>
          </p>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Rental income</label>
            <input
              type="number"
              step="0.01"
              name="rental_income"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>

          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Other rental related income</label
            >
            <input
              type="number"
              step="0.01"
              name="other_income"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>

          <p class="choosing-business-type-text">
            <strong>Expense Details</strong>
          </p>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Council Rates</label>
            <input
              type="text"
              name="council_rates"
              class="form-control border-dark"
              placeholder="123 Example Street"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Interest on Loans</label>
            <input
              type="text"
              name="interest_loans"
              class="form-control border-dark"
              placeholder="ANYTOWN"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Property Agent Fees/Commissions</label
            >
            <input
              type="text"
              name="agent_fees"
              class="form-control border-dark"
              placeholder="NSW"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Repairs and Maintenance</label
            >
            <input
              type="text"
              name="repairs"
              class="form-control border-dark"
              placeholder="2000"
            />
          </div>

          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Body Corporate Fees</label
            >
            <input
              type="text"
              name="body_corp"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Water Charges</label>
            <input
              type="text"
              name="water_charges"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Capital Allowances (depreciation)</label
            >
            <input
              type="text"
              name="capital_allowance"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Capital works deductions</label
            >
            <input
              type="text"
              name="capital_works"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Advertising for tenants</label
            >
            <input
              type="text"
              name="advertising"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Gardening/Lawn Mowing</label
            >
            <input
              type="text"
              name="gardening"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Insurance</label>
            <input
              type="text"
              name="insurance"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Land tax</label>
            <input
              type="text"
              name="land_tax"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Legal fees</label>
            <input
              type="text"
              name="legal_fees"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Pest control</label>
            <input
              type="text"
              name="pest_control"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Stationery, telephone, and postage</label
            >
            <input
              type="text"
              name="stationery"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Travel expenses</label>
            <input
              type="text"
              name="travel_expenses"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Sundry rental expenses</label
            >
            <input
              type="text"
              name="sundry"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
          <div class="col-12 mb-3">
            <p class="choosing-business-type-text">
              <strong>Net amount of rent - income / loss</strong>
            </p>
            <label class="choosing-business-type-text">Net rent</label>
            <p class="choosing-business-type-text text-secondary" id="netRent">
              00.00$
            </p>
          </div>
        </div>
      </div>
        <div class="col-12 mt-4 mb-3">
          <p class="choosing-business-type-text">
            Attach copy of interest statements. PnL’s for your rental property
            </p>
          <input
            type="file"
            name="rental_file"
            id="rentalFileInput"
            class="d-none"
          />
          <button type="button" class="btn btn_add" id="triggerRentalFile">
            <img src="{{ asset('img/icons/plus.png') }}" alt="plus" /> Choose
            file
          </button>
          <p
            id="rentalSelectedFile"
            class="choosing-business-type-text text-muted mb-0 mt-2"
          >
            No file chosen
          </p>
        </div>
    </form>

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
