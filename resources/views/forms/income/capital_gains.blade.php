<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Capital Gains or Losses</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="row mb-3">
        <p class="choosing-business-type-text">
            <strong>Includes selling or exchanging assets such as property, shares and cryptocurrency</strong>
        </p>
        <div class="grin_box_border mb-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Have you applied an exemption or rollover?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="exemption_applied" id="exemptionYes" value="yes">
                        <label class="form-check-label custom-label" for="exemptionYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="exemption_applied" id="exemptionNo" value="no">
                        <label class="form-check-label custom-label" for="exemptionNo">No</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <p class="choosing-business-type-text">Exemption or rollover code</p>
                <div class="col-md-6 mb-3">
                    <select class="form-control border-dark" id="rolloverCode" name="rollover_code">
                        <option value="">Select an option</option>
                        <option value="152-C">Small business active asset reduction (Subdivision 152-C)</option>
                        <option value="152-D">Small business retirement exemption (Subdivision 152-D)</option>
                        <option value="152-E">Small business roll-over (Subdivision 152-E)</option>
                        <option value="152-B">Small business 15 year exemption (Subdivision 152-B)</option>
                        <option value="855">Foreign resident CGT exemption (Division 855)</option>
                        <option value="124-M">Scrip for scrip roll-over (Subdivision 124-M)</option>
                        <option value="118-B">Main residence exemption (Subdivision 118-B)</option>
                        <option value="pre-cgt">Capital gains disregarded as a result of the sale of a pre-CGT asset</option>
                        <option value="122">Disposal or creation of assets in a wholly-owned company (Division 122)</option>
                        <option value="124">Replacement asset roll-overs (Division 124)</option>
                        <option value="124-F">Exchange of rights or options (Subdivision 124-F)</option>
                        <option value="615-company">Exchange of shares in one company for shares in another company (Division 615)</option>
                        <option value="615-unit">Exchange of units in a unit trust for shares in a company (Division 615)</option>
                        <option value="125-B">Demerger roll-over (Subdivision 125-B)</option>
                        <option value="126">Same asset roll-overs (Division 126)</option>
                        <option value="328-G">Small business restructure roll-over (Subdivision 328-G)</option>
                        <option value="360-A">Early stage investor (Subdivision 360-A)</option>
                        <option value="118-F">Venture capital investment (Subdivision 118-F)</option>
                        <option value="other">Other exemptions and rollovers</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="rollover_other_detail" id="rolloverOtherInput" class="form-control border-dark" placeholder="What do you do for a living?" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Credit for foreign resident capital gains withholding amounts</p>
                    <input type="number" step="0.01" name="foreign_credit" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>
        </div>
        
        <p class="choosing-business-type-text">
            <strong>Capital Gains or Losses Excluding Managed Funds</strong>
        </p>
        <div class="grin_box_border mb-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Total Capital Gain eligible for discount</p>
                    <input type="number" step="0.01" name="gain_discount_eligible" class="form-control border-dark" placeholder="00.00$">
                </div>

                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Total Capital Gain not eligible for discount</p>
                    <input type="number" step="0.01" name="gain_not_discounted" class="form-control border-dark" placeholder="00.00$">
                </div>

                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Total current year Capital Losses</p>
                    <input type="number" step="0.01" name="current_year_losses" class="form-control border-dark" placeholder="00.00$">
                </div>

                <div class="col-md-6 mb-3">
                    <p class="choosing-business-type-text">Total prior year Capital Losses</p>
                    <input type="number" step="0.01" name="prior_year_losses" class="form-control border-dark" placeholder="00.00$">
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <p class="choosing-business-type-text">Do you need to use a schedule?</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="use_schedule" id="scheduleYes" value="yes">
                    <label class="form-check-label custom-label" for="scheduleYes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input custom-radio" type="radio" name="use_schedule" id="scheduleNo" value="no">
                    <label class="form-check-label custom-label" for="scheduleNo">No</label>
                </div>
            </div>

            <div class="col-12 mb-3 d-none" id="scheduleExtraBlock">
                <p class="choosing-business-type-text">
                    <strong>
                        1. Current year capital gains and capital losses
                    </strong>
                </p>
                <div class="grin_box_border mb-4">
                    <div class="row">
                            <p class="choosing-business-type-text">Shares in companies listed on an Australian securities exchange</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_listed_shares_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_listed_shares_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Other shares</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_shares_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_shares_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Units in unit trusts listed on an Australian securities exchange</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_listed_units_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_listed_units_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Other units</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_units_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_units_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Real estate situated in Australia</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_real_estate_au_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_real_estate_au_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Other real estate</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_real_estate_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_real_estate_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>

                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Amount of capital gains from a trust (including a managed fund)</p>                                        
                            <p class="choosing-business-type-text text-secondary" id="cg_trust_amount">00.00$</p>   
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Other CGT assets and any other CGT events</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_assets_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_other_assets_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>
                    </div>
                    <div class="row">
                        <p class="choosing-business-type-text">Amount of capital gain previously deferred under transitional CGT relief for superannuation funds</p>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_super_deferred_gain" class="form-control border-dark" placeholder="Capital gain">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" name="cg_super_deferred_loss" class="form-control border-dark" placeholder="Capital loss">
                        </div>

                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Total current year capital gains</p>
                            <p class="choosing-business-type-text text-secondary" id="cg_total_current_year">00.00$</p>
                        </div>
                    </div>
                </div>
            
                <p class="choosing-business-type-text">
                    <strong>
                        2. Capital Losses
                    </strong>
                </p>
                <div class="grin_box_border mb-4">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Capital Losses</p>
                            <p class="choosing-business-type-text text-secondary" id="cl_current">00.00$</p>

                        </div>

                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Total current year capital losses applied</p>
                            <p class="choosing-business-type-text text-secondary" id="cl_current_applied">00.00$</p>

                        </div>

                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Total prior year net capital losses applied</p>
                            <p class="choosing-business-type-text text-secondary" id="cl_prior_applied">00.00$</p>

                        </div>

                        <div class="col-12 mb-3">
                            <p class="choosing-business-type-text">Total capital losses applied</p>
                            <p class="choosing-business-type-text text-secondary" id="cl_total_applied">00.00$</p>

                        </div>
                    </div>
                </div>
            
                <p class="choosing-business-type-text">
                    <strong>
                        3. Unapplied net capital losses carried forward
                    </strong>
                </p>
                <div class="grin_box_border mb-4">
                    <div class="">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Other net capital losses carried forward to later income years</p>
                            <p class="choosing-business-type-text text-secondary" id="cl_carried_forward">00.00$</p>
                        </div>
                    </div>
                </div>
            
                <p class="choosing-business-type-text">
                    <strong>
                        4. CGT Discount
                    </strong>
                </p>
                <div class="grin_box_border mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total CGT discount applied</p>                                        
                            <p class="choosing-business-type-text text-secondary" id="cgt_discount_applied">00.00$</p>
                        </div>
                    </div>
                </div>
            
                <p class="choosing-business-type-text">
                    <strong>
                        5. CGT concessions for small business
                    </strong>
                </p>
                <div class="grin_box_border mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Small business active asset reduction</p>
                            <input type="number" name="cgt_concession_active" class="form-control border-dark" placeholder="00.00$">
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Small business retirement exemption</p>
                            <input type="number" name="cgt_concession_retirement" class="form-control border-dark" placeholder="00.00$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Small business rollover</p>
                            <input type="number" name="cgt_concession_rollover" class="form-control border-dark" placeholder="00.00$">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total small business concessions applied</p>                            
                            <p class="choosing-business-type-text text-secondary" id="cgt_concession_total">00.00$</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="choosing-business-type-text">Net capital gain</p>
                <p class="choosing-business-type-text text-secondary" id="net_gain">00.00$</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="choosing-business-type-text">Total current year capital gains</p>
                <p class="choosing-business-type-text text-secondary" id="total_current_gains">00.00$</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <p class="choosing-business-type-text">Net capital losses carried forward to later income years</p>
                <p class="choosing-business-type-text text-secondary" id="carried_losses">00.00$</p>

            </div>
        </div>
        <div class="row align-items-end">
            <p class="choosing-business-type-text">
                Attach Managed Fund statements here (optional)
            </p>
            <div class="col-md-6 mb-3">
                <input type="file" name="cgt_attachment" id="managedFundInput" class="d-none">
                <button type="button" class="btn btn_add" id="customFileTrigger">
                    <img src="{{ asset('img/icons/plus.png') }}" alt="plus">
                    Choose file
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <p id="selectedFileName" class="choosing-business-type-text text-muted mb-0">
                    No file chosen
                </p>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("rolloverCode");
    const otherInput = document.getElementById("rolloverOtherInput");

    select.addEventListener("change", function () {
        if (this.value === "other") {
            otherInput.disabled = false;
            otherInput.focus();
        } else {
            otherInput.disabled = true;
            otherInput.value = "";
        }
    });

    const scheduleRadios = document.querySelectorAll("input[name='use_schedule']");
    const scheduleBlock = document.getElementById("scheduleExtraBlock");

    scheduleRadios.forEach(radio => {
        radio.addEventListener("change", function () {
            if (this.value === "yes") {
                scheduleBlock.classList.remove("d-none");
            } else {
                scheduleBlock.classList.add("d-none");
            }
        });
    });
});
</script>
