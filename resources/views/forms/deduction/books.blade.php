<form id="booksExpensesForm">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Books & Other Work-Related Expenses</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="col-md-6 form-group mb-3">
    <label class="choosing-business-type-text" for="books_expense_count">
      Number of expenses you need to claim (choose)
    </label>
    <select name="books_expense_count" id="books_expense_count" class="form-control border-dark">
      <option value="">Choose</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>

  {{-- @for ($i = 1; $i <= 4; $i++) --}}
  {{-- <div class="grin_box_border p-3 mb-3 books-expense-block" id="books_expense_block_{{ $i }}" style="display: none;"> --}}
  <div class="grin_box_border p-3 mb-3 books-expense-block" id="books_expense_block_{{ $i }}" style="">
    <div class="col-md-6">
            <div class="form-group mb-2">
                <label>Type of expense</label>
                <select name="books_expense_type_{{ $i }}" class="form-control border-dark">
                    <option value="">Choose</option>
                    <option value="books">Books and journals</option>
                    <option value="seminars">Seminars</option>
                    <option value="newspapers">Newspapers</option>
                    <option value="subscriptions">Subscriptions</option>
                    <option value="meals">Award overtime meal allowance</option>
                    <option value="other">Other</option>
                </select>
                </div>

                <div class="form-group mb-2">
                <label>Describe this item in a few words (eg. “Industry Journal Subscription”)</label>
                <input type="text" name="books_expense_description_{{ $i }}" class="form-control border-dark" placeholder="...">
                </div>

                <div class="form-group mb-2">
                <label>What sort of records do you have for this expense? (eg. a receipt or invoice)</label>
                <select name="books_expense_record_type_{{ $i }}" class="form-control border-dark">
                    <option value="">Choose</option>
                    <option value="invoice">Invoice / receipt</option>
                    <option value="payg">PAYG summary</option>
                    <option value="allowance">Allowance received</option>
                    <option value="recorded">Actual recorded cost</option>
                </select>
                </div>

                <div class="form-group mb-2">
                <label>Cost of this item</label>
                <input type="text" name="books_expense_cost_{{ $i }}" class="form-control border-dark" placeholder="00.00$">
                </div>
    </div>
  </div>
  {{-- @endfor --}}

  <div class="mt-3">
    <label class="choosing-business-type-text d-block mb-2">
      Attach a simple breakdown of your expenses (optional)
    </label>
    <input type="file" name="books_expense_file" id="books_expense_file" class="d-none" />
    <button type="button" class="btn btn_add" id="books_expense_trigger_file">
      <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Choose file
    </button>
    <p id="books_expense_file_name" class="choosing-business-type-text text-muted mb-0 mt-2">No file chosen</p>
  </div>
</form>
{{-- <script>
document.addEventListener("DOMContentLoaded", () => {
  const countSelect = document.getElementById("books_expense_count");

  countSelect.addEventListener("change", () => {
    const count = parseInt(countSelect.value) || 0;

    for (let i = 1; i <= 4; i++) {
      const block = document.getElementById(`books_expense_block_${i}`);
      if (block) block.style.display = i <= count ? "block" : "none";
    }
  });

  const fileInput = document.getElementById("books_expense_file");
  const fileTrigger = document.getElementById("books_expense_trigger_file");
  const fileNameDisplay = document.getElementById("books_expense_file_name");

  fileTrigger.addEventListener("click", () => fileInput.click());

  fileInput.addEventListener("change", () => {
    fileNameDisplay.textContent = fileInput.files[0]?.name || "No file chosen";
  });
});
</script> --}}
