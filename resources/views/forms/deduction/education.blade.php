<form>
  <!-- Education-Related Car Expense -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Education-Related Car Expense</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border mb-3">
    <label class="form-label d-block">Did you use your vehicle for travel between your home or work and your classes?</label>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="car_travel" id="car_travel_yes" value="yes">
      <label class="form-check-label custom-label" for="car_travel_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="car_travel" id="car_travel_no" value="no">
      <label class="form-check-label custom-label" for="car_travel_no">No</label>
    </div>

    <div id="car_travel_block" class="mt-3" style="display: none;">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">In a few words, why do you use your car for Education?</label>
          <input type="text" class="form-control" name="car_education_reason" placeholder="abc">
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label">Number of kilometres travelled for education?</label>
          <input type="text" class="form-control" name="car_kilometres" placeholder="0 km">
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label d-block">Is the vehicle registered in your name?</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="vehicle_owned" id="vehicle_owned_yes" value="yes">
            <label class="form-check-label custom-label" for="vehicle_owned_yes">Yes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input custom-radio" type="radio" name="vehicle_owned" id="vehicle_owned_no" value="no">
            <label class="form-check-label custom-label" for="vehicle_owned_no">No</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Self-Education Expense -->
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Work-Related Self-Education Expenses</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help">
  </div>

  <div class="grin_box_border mb-3">
    <label class="form-label d-block">Did you pay for self-education expenses that are directly related to your current employment?</label>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="edu_expense" id="edu_expense_yes" value="yes">
      <label class="form-check-label custom-label" for="edu_expense_yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input custom-radio" type="radio" name="edu_expense" id="edu_expense_no" value="no">
      <label class="form-check-label custom-label" for="edu_expense_no">No</label>
    </div>

    <div id="edu_expense_block" class="mt-3" style="display: none;">
      <div class="mb-3">
        <label class="form-label">Why did you do this education?</label>
        <select name="edu_reason" class="form-select">
          <option value="">Choose</option>
          <option value="skill">Maintains or improves a skill or specific knowledge</option>
          <option value="income">Leads to increased income</option>
          <option value="other">Other circumstances​</option>
        </select>
      </div>

      <div id="edu_expense_items">
        <div class="grin_box_border p-3 mb-3 edu-expense-item">
    <div class="mb-3">
    <label class="form-label">Type of education expense</label>
    <select name="edu_expense_type[]" class="form-select edu-expense-type">
      <option value="">Choose</option>
      <option value="fees">Education Fees​​</option>
      <option value="books">Books stationery consumables</option>
      <option value="laptop">Laptop Computer</option>
      <option value="desktop">Desktop Computer</option>
      <option value="tablet">Tablet Computer</option>
      <option value="other">Other</option>
      <option value="repair">Repair expenses​​</option>
    </select>
  </div>

  <!-- Это поле скроем для Laptop -->
  <div class="mb-3 amount-paid-block">
    <label class="form-label">Amount you paid for this item</label>
    <input type="number" step="0.01" class="form-control edu-amount" name="edu_amount[]" placeholder="00.00$">
  </div>

  <!-- Дополнительные поля для Laptop (изначально скрыты) -->
  <div class="laptop-extra-fields" style="display:none;">

    <div class="row">
        <div class="col-md-6 mb-3">
      <label class="form-label">Total Amount you paid for this item</label>
      <input type="number" step="0.01" class="form-control laptop-total-amount" name="laptop_total_amount[]" placeholder="00.00$">
    </div>

    <div class="col-md-6 mb-3">
      <label class="form-label">What Percent of use was for education purposes?</label>
      <input type="number" step="0.01" min="0" max="100" class="form-control laptop-percent-use" name="laptop_percent_use[]" placeholder="0%">
    </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Day</label>
        <select name="laptop_purchase_day[]" class="form-control border-dark">
          <option value="">Day</option>
          <!-- options 1-31 -->
          ${[...Array(31)].map((_,i) => `<option value="${i+1}">${i+1}</option>`).join('')}
        </select>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Month</label>
        <select name="laptop_purchase_month[]" class="form-control border-dark">
          <option value="">Month</option>
          ${[...Array(12)].map((_,i) => {
            const month = new Date(0, i).toLocaleString('en', {month: 'long'});
            return `<option value="${i+1}">${month}</option>`;
          }).join('')}
        </select>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Year</label>
        <select name="laptop_purchase_year[]" class="form-control border-dark">
          <option value="">Year</option>
          <!-- Years from current year down to 1990 -->
          ${Array.from({length: new Date().getFullYear() - 1990 + 1}, (_, i) => new Date().getFullYear() - i).map(y => `<option value="${y}">${y}</option>`).join('')}
        </select>
      </div>
    </div>
  </div>
</div>

      </div>

      <div class="mb-3">
        <button type="button" class="btn btn_add" id="addEduExpense">
            <img src="{{ asset('img/icons/plus.png') }}" alt="plus">Add another education expense
        </button>
      </div>

      <div class="mb-3">
        <label class="form-label">Your total education claim based on the above:</label>
        <p class="choosing-business-type-text text-secondary" id="edu_total">00.00$</p>
      </div>
      <!-- File upload -->
        <div class="row mb-3 align-items-end">
            <p class="choosing-business-type-text">
                Attach a simple breakdown of your expenses (optional)
            </p>
            <div class="col-md-6 mb-3">
                <input type="file" name="edu_file" id="eduFileInput" class="d-none">
                <button type="button" class="btn btn_add" id="triggerEduFile">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                Choose file
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <p id="eduFileName" class="choosing-business-type-text text-muted mb-0">
                No file chosen
                </p>
            </div>
        </div>
    </div>
  </div>
</form>

<!-- JS -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Показывать/скрывать блоки
  document.querySelectorAll('input[name="car_travel"]').forEach(input => {
    input.addEventListener('change', function () {
      document.getElementById('car_travel_block').style.display = this.value === 'yes' ? 'block' : 'none';
    });
  });

  document.querySelectorAll('input[name="edu_expense"]').forEach(input => {
    input.addEventListener('change', function () {
      document.getElementById('edu_expense_block').style.display = this.value === 'yes' ? 'block' : 'none';
    });
  });

  // Добавить ещё один блок расходов на образование
  const eduContainer = document.getElementById('edu_expense_items');
  const addEduBtn = document.getElementById('addEduExpense');
  const totalField = document.getElementById('edu_total');

  function updateEduTotal() {
    let total = 0;
    document.querySelectorAll('.edu-amount').forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });
    totalField.value = total.toFixed(2) + "$";
  }

  // отслеживать изменение суммы
  eduContainer.addEventListener('input', function (e) {
    if (e.target.classList.contains('edu-amount')) {
      updateEduTotal();
    }
  });

  addEduBtn.addEventListener('click', function () {
    const first = eduContainer.querySelector('.edu-expense-item');
    const clone = first.cloneNode(true);
    clone.querySelectorAll('input').forEach(input => input.value = '');
    clone.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
    eduContainer.appendChild(clone);
  });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  // File trigger
  const eduFileInput = document.getElementById("eduFileInput");
  const triggerEduFile = document.getElementById("triggerEduFile");
  const eduFileName = document.getElementById("eduFileName");

  triggerEduFile.addEventListener("click", () => eduFileInput.click());

  eduFileInput.addEventListener("change", () => {
    eduFileName.textContent = eduFileInput.files.length
      ? eduFileInput.files[0].name
      : "No file chosen";
  });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
  const eduContainer = document.getElementById('edu_expense_items');
  const addEduBtn = document.getElementById('addEduExpense');

  function updateEduTotal() {
    let total = 0;
    document.querySelectorAll('.edu-amount').forEach(input => {
      const val = parseFloat(input.value);
      if (!isNaN(val)) total += val;
    });
    document.getElementById('edu_total').value = total.toFixed(2) + "$";
  }

  // Отслеживаем изменения select и показываем/скрываем поля
  function toggleLaptopFields(block) {
    const typeSelect = block.querySelector('.edu-expense-type');
    const amountBlock = block.querySelector('.amount-paid-block');
    const laptopExtra = block.querySelector('.laptop-extra-fields');

    if (typeSelect.value === 'laptop') {
      amountBlock.style.display = 'none';
      laptopExtra.style.display = 'block';
    } else {
      amountBlock.style.display = 'block';
      laptopExtra.style.display = 'none';
    }
  }

  // Инициализация блока
  function initEduBlock(block) {
    const typeSelect = block.querySelector('.edu-expense-type');
    const amountInput = block.querySelector('.edu-amount');

    typeSelect.addEventListener('change', () => {
      toggleLaptopFields(block);
      updateEduTotal();
    });

    // При изменении суммы обновляем общий итог (для обычных)
    amountInput.addEventListener('input', updateEduTotal);
  }

  // Инициализация всех блоков при загрузке
  eduContainer.querySelectorAll('.edu-expense-item').forEach(initEduBlock);

  // Добавление нового блока
  addEduBtn.addEventListener('click', function () {
    const first = eduContainer.querySelector('.edu-expense-item');
    const clone = first.cloneNode(true);

    clone.querySelectorAll('input').forEach(input => input.value = '');
    clone.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

    eduContainer.appendChild(clone);
    initEduBlock(clone);
  });
});

</script>

