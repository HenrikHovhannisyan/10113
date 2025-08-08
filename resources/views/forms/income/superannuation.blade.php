<section>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Superannuation Income Stream</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <p class="choosing-business-type-text">
    Complete this section if you receive money from your super fund on a regular basis (not just a one-time lump sum payment).
  </p>

  <div class="grin_box_border mb-4">
    <p class="choosing-business-type-text">
        “Where can I find the details?” Your super fund should provide a summary with the numbers below.
    </p>
    <div id="superStreamContainer">
      <section class="super-block">
        <!-- Payment period start date -->
        <p class="choosing-business-type-text">Payment period start date</p>
        <div class="row">
          <div class="col-md-4 mb-3">
            <select name="payment_start_day[]" class="form-control border-dark">
              <option value="">Day</option>
              @for ($i = 1; $i <= 31; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <select name="payment_start_month[]" class="form-control border-dark">
              <option value="">Month</option>
              @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <select name="payment_start_year[]" class="form-control border-dark">
              <option value="">Year</option>
              @for ($i = date('Y'); $i >= 1990; $i--)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>

        <!-- Payment period end date -->
        <p class="choosing-business-type-text">Payment period end date</p>
        <div class="row">
          <div class="col-md-4 mb-3">
            <select name="payment_end_day[]" class="form-control border-dark">
              <option value="">Day</option>
              @for ($i = 1; $i <= 31; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <select name="payment_end_month[]" class="form-control border-dark">
              <option value="">Month</option>
              @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <select name="payment_end_year[]" class="form-control border-dark">
              <option value="">Year</option>
              @for ($i = date('Y'); $i >= 1990; $i--)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
        </div>

        <!-- Tax withheld & Taxable component - Taxed element -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Tax withheld</label>
            <input type="text" name="tax_withheld[]" class="form-control border-dark" placeholder="00.00$" />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Taxable component - Taxed element</label>
            <input type="text" name="taxable_taxed[]" class="form-control border-dark" placeholder="00.00$" />
          </div>
        </div>

        <!-- Taxable component - Untaxed element & Tax offset -->
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Taxable component - Untaxed element</label>
            <input type="text" name="taxable_untaxed[]" class="form-control border-dark" placeholder="00.00$" />
          </div>
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Tax offset</label>
            <input type="text" name="tax_offset[]" class="form-control border-dark" placeholder="00.00$" />
          </div>
        </div>

        <!-- Question -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="choosing-business-type-text">
                    Are you under 60 years of age and a death benefits dependent, where the deceased died at 60 years or over?
                </p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="under60_dependent" id="under60Yes" value="yes">
                    <label class="form-check-label custom-label" for="under60Yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="under60_dependent" id="under60No" value="no">
                    <label class="form-check-label custom-label" for="under60No">No</label>
                </div>
                <input type="text" name="under60_details" class="form-control border-dark mt-2" id="under60Details" placeholder="Add more details if needed" style="display: none;">
            </div>
        </div>
      </section>
    </div>
  </div>

  <!-- Add/Delete buttons -->
  <div class="row mb-4">
    <div class="col-md-6 mb-3">
      <button type="button" class="btn btn_add" id="btnAddSuper">
        <img src="{{ asset('img/icons/plus.png') }}" alt="plus" />
        Add another payment
      </button>
      <button type="button" class="btn btn_delete" id="btnDeleteSuper">
        Delete another payment
      </button>
    </div>
  </div>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("superStreamContainer");
    const addBtn = document.getElementById("btnAddSuper");
    const delBtn = document.getElementById("btnDeleteSuper");

    addBtn.addEventListener("click", function () {
      const blocks = container.querySelectorAll(".super-block");
      const last = blocks[blocks.length - 1];
      const clone = last.cloneNode(true);

      clone.querySelectorAll("input").forEach(input => input.value = "");
      clone.querySelectorAll("select").forEach(select => select.selectedIndex = 0);

      container.appendChild(clone);
    });

    delBtn.addEventListener("click", function () {
      const blocks = container.querySelectorAll(".super-block");
      if (blocks.length > 1) {
        blocks[blocks.length - 1].remove();
      }
    });
  });
</script>
