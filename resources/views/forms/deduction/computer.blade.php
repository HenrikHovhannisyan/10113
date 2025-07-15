<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Computer / Laptop</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

    <div class="row">
    <p class="choosing-business-type-text mb-4">
      Are you required to do some of your work on your personal computer? Did you pay for the computer yourself? If you answered “yes”, then you might be able to claim part of the cost as a deduction. Includes desktop, laptop, tablet, iPad or printer that cost more than $300.
    </p>
        <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text">Number of expenses you need to claim (choose)</label>
            <select id="computerCount" class="form-control border-dark">
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
            </select>
        </div>
    </div>

  <div id="computerContainer">
    <section class="grin_box_border mb-4 computer-block">
      <div class="row">
        <div class="col-md-6 mb-3 pt-0 pt-md-4">
          <label class="choosing-business-type-text">Describe the computer (eg. Apple MacBook Air)</label>
          <input type="text" name="computer_description" class="form-control border-dark" placeholder="...">
        </div>
        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">In a few words, WHY do you use this computer for work? (eg. “I log in to manage evening staff rosters”</label>
          <input type="text" name="computer_reason" class="form-control border-dark" placeholder="...">
        </div>

        <!-- Date of purchase -->
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Day</label>
          <select name="computer_day" class="form-control border-dark">
            <option value="">Day</option>
            @for ($i = 1; $i <= 31; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Month</label>
          <select name="computer_month" class="form-control border-dark">
            <option value="">Month</option>
            @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
            @endfor
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label class="choosing-business-type-text">Year</label>
          <select name="computer_year" class="form-control border-dark">
            <option value="">Year</option>
            @for ($i = date('Y'); $i >= 1990; $i--)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">What % of this computer’s usage is for your work?</label>
          <input type="text" name="computer_percentage" class="form-control border-dark" placeholder="0%">
        </div>

        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">What sort of records do you have for this item? (eg. an invoice or receipt)</label>
          <select name="computer_record" class="form-control border-dark">
            <option value="">Choose</option>
            <option value="invoice">Invoice / receipt</option>
            <option value="recorded">Actual recorded cost</option>
          </select>
        </div>

        <div class="col-md-6 mb-3">
          <label class="choosing-business-type-text">Cost of this item</label>
          <input type="number" name="computer_cost" step="0.01" class="form-control border-dark" placeholder="00.00$">
        </div>
      </div>
    </section>
  </div>

  <!-- File upload -->
  <div class="row mb-3 align-items-end">
    <p class="choosing-business-type-text">
      Attach a copy of your receipts or invoices (optional)
    </p>
    <div class="col-md-6 mb-3">
      <input type="file" name="computer_file" id="computerFileInput" class="d-none">
      <button type="button" class="btn btn_add" id="triggerComputerFile">
        <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
        Choose file
      </button>
    </div>
    <div class="col-md-6 mb-3">
      <p id="computerFileName" class="choosing-business-type-text text-muted mb-0">
        No file chosen
      </p>
    </div>
  </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // File trigger
  const fileInput = document.getElementById("computerFileInput");
  const trigger = document.getElementById("triggerComputerFile");
  const fileDisplay = document.getElementById("computerFileName");

  trigger.addEventListener("click", () => fileInput.click());
  fileInput.addEventListener("change", () => {
    fileDisplay.textContent = fileInput.files.length ? fileInput.files[0].name : "No file chosen";
  });
});
</script>

