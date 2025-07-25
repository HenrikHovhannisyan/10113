<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Superannuation Co-Contribution</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border p-3 mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="co_contribution_income" class="choosing-business-type-text mb-2">
                    Income from investment, partnership and other sources amount
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="co_contribution_income" name="co_contribution_income" placeholder="00.00$">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="co_contribution_indicator" class="choosing-business-type-text mb-2">
                    Superannuation Co-contributions indicator
                </label>
                <select name="co_contribution_indicator" id="co_contribution_indicator" class="form-control border-dark">
                    <option value="">Choose</option>
                    <option value="C">C: Valid amount in F is 0</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="co_contribution_employment_income" class="choosing-business-type-text mb-2">
                    Other income from employment and business
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="co_contribution_employment_income" name="co_contribution_employment_income" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
                <label for="co_contribution_deductions" class="choosing-business-type-text mb-2">
                    Other deductions from business income
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="co_contribution_deductions" name="co_contribution_deductions" placeholder="00.00$">
            </div>
        </div>
    </div>

</form>