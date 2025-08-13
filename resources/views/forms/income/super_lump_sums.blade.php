<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Super Lump Sums</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Number of Lump Sum Payments you received?</label>
        <input type="number" name="lump_sum_count" class="form-control border-dark" value="2">
    </div>

    <!-- BLOCK 1 -->
    <div class="grin_box_border mb-4">
        <div class="row">
            <div class="col-12 mb-2">
                <p class="choosing-business-type-text">Date of payment</p>
            </div>
            <!-- Day -->
            <div class="col-md-4 mb-3">
                <select name="lump_day[]" class="form-control border-dark">
                    <option value="">Day</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <!-- Month -->
            <div class="col-md-4 mb-3">
                <select name="lump_month[]" class="form-control border-dark">
                    <option value="">Month</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                    @endfor
                </select>
            </div>
            <!-- Year -->
            <div class="col-md-4 mb-3">
                <select name="lump_year[]" class="form-control border-dark">
                    <option value="">Year</option>
                    @for ($i = date('Y'); $i >= 1990; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Tax withheld</label>
                <input type="text" name="tax_withheld[]" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Taxable Component - Taxed element</label>
                <input type="text" name="taxed_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Taxable Component - Untaxed element</label>
                <input type="text" name="untaxed_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Australian Superannuation lump sum payments tax-free component</label>
                <input type="text" name="tax_free_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <p class="choosing-business-type-text">Is this a death benefit payment?</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="is_death_benefit_0" value="yes" id="deathYes0">
                    <label class="form-check-label custom-label" for="deathYes0">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="is_death_benefit_0" value="no" id="deathNo0">
                    <label class="form-check-label custom-label" for="deathNo0">No</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Payer's ABN</label>
                <input type="text" name="payer_abn[]" class="form-control border-dark" placeholder="11 685 404 406">
            </div>
        </div>
    </div>

    <!-- BLOCK 2 -->
    <div class="grin_box_border mb-4">
        <div class="row">
            <div class="col-12 mb-2">
                <p class="choosing-business-type-text">Date of payment</p>
            </div>
            <!-- Day -->
            <div class="col-md-4 mb-3">
                <select name="lump_day[]" class="form-control border-dark">
                    <option value="">Day</option>
                    @for ($i = 1; $i <= 31; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <!-- Month -->
            <div class="col-md-4 mb-3">
                <select name="lump_month[]" class="form-control border-dark">
                    <option value="">Month</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                    @endfor
                </select>
            </div>
            <!-- Year -->
            <div class="col-md-4 mb-3">
                <select name="lump_year[]" class="form-control border-dark">
                    <option value="">Year</option>
                    @for ($i = date('Y'); $i >= 1990; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Tax withheld</label>
                <input type="text" name="tax_withheld[]" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Taxable Component - Taxed element</label>
                <input type="text" name="taxed_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Taxable Component - Untaxed element</label>
                <input type="text" name="untaxed_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Australian Superannuation lump sum payments tax-free component</label>
                <input type="text" name="tax_free_component[]" class="form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <p class="choosing-business-type-text">Is this a death benefit payment?</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="is_death_benefit_1" value="yes" id="deathYes1">
                    <label class="form-check-label custom-label" for="deathYes1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="is_death_benefit_1" value="no" id="deathNo1">
                    <label class="form-check-label custom-label" for="deathNo1">No</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Payer's ABN</label>
                <input type="text" name="payer_abn[]" class="form-control border-dark" placeholder="11 685 404 406">
            </div>
        </div>
    </div>
</section>
