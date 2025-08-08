<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Partnerships and Trusts</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <!-- Partnership and Trust Names -->
    <div class="grin_box_border mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Partnership Name</label>
        <input type="text" name="partnership_name" class="form-control border-dark" placeholder="Name">
        </div>
        <div class="col-md-6 mb-3">
        <label class="choosing-business-type-text">Trust Name</label>
        <input type="text" name="trust_name" class="form-control border-dark" placeholder="Name">
        </div>
    </div>
    </div>

    <!-- Primary Production -->
    <p class="choosing-business-type-text">
        <strong>Primary Production</strong>
    </p>
    <div class="grin_box_border mb-4">
    <div class="row">
        <div class="col-md-6 mb-3">
        <label>Distribution from partnerships</label>
        <input type="number" name="distribution_partnerships" class="form-control border-dark" placeholder="00.00$">
        </div>
        <div class="col-md-6 mb-3">
        <label>Distribution from partnerships profit/loss</label>
        <select name="distribution_partnerships_result" class="form-control border-dark">
            <option>Choose</option>
        </select>
        </div>

        <div class="col-md-6 mb-3">
        <label>Distribution from trusts</label>
        <input type="number" name="distribution_trusts" class="form-control border-dark" placeholder="00.00$">
        </div>
        <div class="col-md-6 mb-3">
        <label>Distribution from trusts profit/loss</label>
        <select name="distribution_trusts_result" class="form-control border-dark">
            <option>Choose</option>
        </select>
        </div>

        <div class="col-md-6 mb-3">
        <label>Distribution from trusts action code</label>
        <select name="distribution_trusts_code" class="form-control border-dark">
            <option>Choose</option>
            <option>T: Discretionary trading trust</option>
            <option>I: Discretionary investment trust</option>
            <option>H: Hybrid trust - trust with fixed and discretionary element</option>
            <option>U: Unit trust (other than Public unit trust described below)</option>
            <option>D: Deceased estate</option>
            <option>P: Public unit trust - listed</option>
            <option>Q: Public unit trust - unlisted</option>
            <option>M: Cash management unit trust</option>
            <option>F: Fixed trust - other than a fixed unit trust or public unit trust</option>
        </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
        <label>Landcare operations and deduction for decline in value of water facility, fencing asset and fodder storage asset</label>
        <input type="number" name="landcare_deduction" class="form-control border-dark" placeholder="00.00$">
        </div>
        <div class="col-md-6 mb-3 pt-0 pt-md-4">
        <label>Other deductions from partnership</label>
        <input type="number" name="deduction_partnership" class="form-control border-dark" placeholder="00.00$">
        </div>
        <div class="col-md-6 mb-3">
        <label>Other deductions from trusts</label>
        <input type="number" name="deduction_trusts" class="form-control border-dark" placeholder="00.00$">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
        <label>Other deductions relating to distribution type</label>
        <select name="other_distribution_deduction_type" class="form-control border-dark">
            <option>Choose</option>
        </select>
        </div>
    </div>
    </div>

    <!-- Non-primary Production -->
    <p class="choosing-business-type-text">
        <strong>Non-primary Production</strong>
    </p>
    <div class="grin_box_border mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
            <label>Non-PP - Distribution from partnerships relating to financial investments, less foreign income</label>
            <input type="text" name="nonpp_dist_partnerships_investment" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Profit/loss</label>
            <select name="nonpp_profit_loss_1" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Share of net rental property income or loss from partnerships</label>
            <input type="text" name="nonpp_net_rental_income" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Profit/loss</label>
            <select name="nonpp_profit_loss_2" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Other distributions from partnerships</label>
            <input type="text" name="nonpp_other_dist_partnerships" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Profit/loss</label>
            <select name="nonpp_profit_loss_3" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Share of net income from trusts less capital gains, foreign income and franked distributions - Managed investment scheme income</label>
            <input type="text" name="nonpp_managed_income" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Profit/loss</label>
            <select name="nonpp_profit_loss_4" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Share of net income from trusts less capital gains, foreign income and franked distributions - other income</label>
            <input type="text" name="nonpp_other_trusts_income" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Profit/loss</label>
            <select name="nonpp_profit_loss_5" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>

            <div class="col-md-6 mb-3">
            <label>Distribution from trusts, less net capital gains and foreign income action code</label>
            <select name="nonpp_action_code" class="form-control border-dark">
                <option value="">Choose</option>
                <option value="S">S: Discretionary service trust</option>
                <option value="T">T: Discretionary trading trust</option>
                <option value="I">I: Discretionary investment trust</option>
                <option value="D">D: Deceased estate</option>
                <option value="M">M: Cash management unit trust</option>
                <option value="P">P: Public unit trust - listed</option>
                <option value="Q">Q: Public unit trust - unlisted</option>
                <option value="U">U: Unit trust (other than Public unit trust)</option>
                <option value="F">F: Fixed trust</option>
                <option value="H">H: Hybrid trust</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
            <label>Non-PP - Franked distributions from trusts relating to investments</label>
            <input type="text" name="nonpp_franked_investments" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Non-PP - Franked distributions from trusts - other</label>
            <input type="text" name="nonpp_franked_other" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Landcare operations expenses</label>
            <input type="text" name="nonpp_landcare_exp" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Non-PP - Managed investment scheme deductions relating to amounts shown at U and C</label>
            <input type="text" name="nonpp_managed_deductions" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Partnership deductions relating to financial investment amounts shown at O</label>
            <input type="text" name="nonpp_partnership_deduction_o" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Non-PP - Partnership deductions relating to rental property income or loss shown at O</label>
            <input type="text" name="nonpp_partnership_deduction_rent_o" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Non-PP - Other deductions relating to distributions shown at O</label>
            <input type="text" name="nonpp_other_deduction_o" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Non-PP - Other deductions relating to distributions shown at U and C</label>
            <input type="text" name="nonpp_other_deduction_uc" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Other deductions relating to distribution type</label>
            <select name="nonpp_other_deductions_type" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>
        </div>
    </div>

    <!-- Share of credits from income and tax offsets -->
    <p class="choosing-business-type-text">
        <strong>Share of credits from income and tax offsets</strong>
    </p>
    <div class="grin_box_border mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
            <label>Partnership share of net small business income less deductions attributable to that share</label>
            <input type="text" name="partner_smallbiz_income" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Trust share of net small business income less deductions attributable to that share</label>
            <input type="text" name="trust_smallbiz_income" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Share of income from trusts</label>
            <input type="text" name="share_trust_income" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Tax credits for tax paid by trustee</label>
            <input type="text" name="trust_tax_credit" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Reason the trustee paid tax from trusts</label>
            <select name="trust_tax_reason" class="form-control border-dark">
                <option value="">Choose</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
            <label>Share of credit for tax withheld where Australian business number not quoted from partnership</label>
            <input type="text" name="partner_credit_abn" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Share of credit for tax withheld where Australian business number not quoted from trust</label>
            <input type="text" name="trust_credit_abn" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Share of franking credit from franked dividends from partnership</label>
            <input type="text" name="partner_franking_credit" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Share of franking credit from franked dividends from trust</label>
            <input type="text" name="trust_franking_credit" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Share of credit for TFN amounts withheld from interest, dividends and unit trust distributions from partnership</label>
            <input type="text" name="partner_tfn_credit" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Share of credit for TFN amounts withheld from interest, dividends and unit trust distributions from trust</label>
            <input type="text" name="trust_tfn_credit" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Credit for TFN amounts withheld from payments from closely held trusts from partnership</label>
            <input type="text" name="partner_closely_held_tfn" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Credit for TFN amounts withheld from payments from closely held trusts from trust</label>
            <input type="text" name="trust_closely_held_tfn" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Share of credit for tax paid by trustee</label>
            <input type="text" name="credit_paid_by_trustee" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3">
            <label>Share of credit for foreign resident withholding amounts (excluding capital gains) from partnership</label>
            <input type="text" name="partner_foreign_credit" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Share of credit for foreign resident withholding amounts (excluding capital gains) from trust</label>
            <input type="text" name="trust_foreign_credit" class="form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
            <label>Share of National rental affordability scheme tax offset from partnership</label>
            <input type="text" name="partner_nras_offset" class="form-control border-dark" placeholder="00.00$">
            </div>

            <div class="col-md-6 mb-3">
            <label>Share of National rental affordability scheme tax offset from trust</label>
            <input type="text" name="trust_nras_offset" class="form-control border-dark" placeholder="00.00$">
            </div>
        </div>
    </div>
</section>
