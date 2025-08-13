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
                <input type="text" 
                       name="partnerships[partnership_name]" 
                       class="form-control border-dark" 
                       placeholder="Name"
                       value="{{ old('partnerships.partnership_name', $incomes->partnerships['partnership_name'] ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="choosing-business-type-text">Trust Name</label>
                <input type="text" 
                       name="partnerships[trust_name]" 
                       class="form-control border-dark" 
                       placeholder="Name"
                       value="{{ old('partnerships.trust_name', $incomes->partnerships['trust_name'] ?? '') }}">
            </div>
        </div>
    </div>

    <!-- Primary Production -->
    <p class="choosing-business-type-text"><strong>Primary Production</strong></p>
    <div class="grin_box_border mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Distribution from partnerships</label>
                <input type="number" 
                       name="partnerships[distribution_partnerships]" 
                       class="form-control border-dark" 
                       placeholder="00.00$"
                       value="{{ old('partnerships.distribution_partnerships', $incomes->partnerships['distribution_partnerships'] ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>Distribution from partnerships profit/loss</label>
                <select name="partnerships[distribution_partnerships_result]" class="form-control border-dark">
                    <option value="">Choose</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Distribution from trusts</label>
                <input type="number" 
                       name="partnerships[distribution_trusts]" 
                       class="form-control border-dark" 
                       placeholder="00.00$"
                       value="{{ old('partnerships.distribution_trusts', $incomes->partnerships['distribution_trusts'] ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>Distribution from trusts profit/loss</label>
                <select name="partnerships[distribution_trusts_result]" class="form-control border-dark">
                    <option value="">Choose</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Distribution from trusts action code</label>
                <select name="partnerships[distribution_trusts_code]" class="form-control border-dark">
                    <option value="">Choose</option>
                    <option value="T" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'T' ? 'selected' : '' }}>T: Discretionary trading trust</option>
                    <option value="I" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'I' ? 'selected' : '' }}>I: Discretionary investment trust</option>
                    <option value="H" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'H' ? 'selected' : '' }}>H: Hybrid trust</option>
                    <option value="U" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'U' ? 'selected' : '' }}>U: Unit trust</option>
                    <option value="D" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'D' ? 'selected' : '' }}>D: Deceased estate</option>
                    <option value="P" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'P' ? 'selected' : '' }}>P: Public unit trust - listed</option>
                    <option value="Q" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'Q' ? 'selected' : '' }}>Q: Public unit trust - unlisted</option>
                    <option value="M" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'M' ? 'selected' : '' }}>M: Cash management unit trust</option>
                    <option value="F" {{ old('partnerships.distribution_trusts_code', $incomes->partnerships['distribution_trusts_code'] ?? '') == 'F' ? 'selected' : '' }}>F: Fixed trust</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Landcare operations and deduction for decline in value of water facility, fencing asset and fodder storage asset</label>
                <input type="number" 
                       name="partnerships[landcare_deduction]" 
                       class="form-control border-dark" 
                       placeholder="00.00$"
                       value="{{ old('partnerships.landcare_deduction', $incomes->partnerships['landcare_deduction'] ?? '') }}">
            </div>
            <div class="col-md-6 mb-3 pt-0 pt-md-4">
                <label>Other deductions from partnership</label>
                <input type="number" 
                       name="partnerships[deduction_partnership]" 
                       class="form-control border-dark" 
                       placeholder="00.00$"
                       value="{{ old('partnerships.deduction_partnership', $incomes->partnerships['deduction_partnership'] ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>Other deductions from trusts</label>
                <input type="number" 
                       name="partnerships[deduction_trusts]" 
                       class="form-control border-dark" 
                       placeholder="00.00$"
                       value="{{ old('partnerships.deduction_trusts', $incomes->partnerships['deduction_trusts'] ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Other deductions relating to distribution type</label>
                <select name="partnerships[other_distribution_deduction_type]" class="form-control border-dark">
                    <option value="">Choose</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Non-primary Production -->
    <p class="choosing-business-type-text"><strong>Non-primary Production</strong></p>
    <div class="grin_box_border mb-4">
        <div class="row">
            @php
                $nonPPFields = [
                    'nonpp_dist_partnerships_investment','nonpp_profit_loss_1','nonpp_net_rental_income','nonpp_profit_loss_2',
                    'nonpp_other_dist_partnerships','nonpp_profit_loss_3','nonpp_managed_income','nonpp_profit_loss_4',
                    'nonpp_other_trusts_income','nonpp_profit_loss_5','nonpp_action_code','nonpp_franked_investments',
                    'nonpp_franked_other','nonpp_landcare_exp','nonpp_managed_deductions','nonpp_partnership_deduction_o',
                    'nonpp_partnership_deduction_rent_o','nonpp_other_deduction_o','nonpp_other_deduction_uc','nonpp_other_deductions_type'
                ];
            @endphp

            @foreach($nonPPFields as $field)
                <div class="col-md-6 mb-3">
                    <label>{{ ucwords(str_replace('_',' ',$field)) }}</label>
                    @if(str_contains($field,'profit_loss') || str_contains($field,'action_code') || $field == 'nonpp_other_deductions_type')
                        <select name="partnerships[{{ $field }}]" class="form-control border-dark">
                            <option value="">Choose</option>
                        </select>
                    @else
                        <input type="text" 
                               name="partnerships[{{ $field }}]" 
                               class="form-control border-dark" 
                               placeholder="00.00$"
                               value="{{ old('partnerships.'.$field, $incomes->partnerships[$field] ?? '') }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Share of credits from income and tax offsets -->
    <p class="choosing-business-type-text"><strong>Share of credits from income and tax offsets</strong></p>
    <div class="grin_box_border mb-4">
        @php
            $creditFields = [
                'partner_smallbiz_income','trust_smallbiz_income','share_trust_income','trust_tax_credit','trust_tax_reason',
                'partner_credit_abn','trust_credit_abn','partner_franking_credit','trust_franking_credit','partner_tfn_credit',
                'trust_tfn_credit','partner_closely_held_tfn','trust_closely_held_tfn','credit_paid_by_trustee',
                'partner_foreign_credit','trust_foreign_credit','partner_nras_offset','trust_nras_offset'
            ];
        @endphp

        <div class="row">
            @foreach($creditFields as $field)
                <div class="col-md-6 mb-3">
                    <label>{{ ucwords(str_replace('_',' ',$field)) }}</label>
                    @if(str_contains($field,'reason'))
                        <select name="partnerships[{{ $field }}]" class="form-control border-dark">
                            <option value="">Choose</option>
                        </select>
                    @else
                        <input type="text" 
                               name="partnerships[{{ $field }}]" 
                               class="form-control border-dark" 
                               placeholder="00.00$"
                               value="{{ old('partnerships.'.$field, $incomes->partnerships[$field] ?? '') }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

