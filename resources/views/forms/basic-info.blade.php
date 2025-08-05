<form action="{{ route('basic-info.store') }}" method="POST">
    @csrf
    <section class="choosing-business-type_section">
        <h2 class="choosing-business-type-title">Please confirm your details</h2>
        <p class="choosing-business-type-text text-center">
            Enter the personal information we need to verify your identity and begin your tax refund application.
        </p>
        <div class="choosing-business-type-form-box">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <input type="text" name="first_name" class="form-control border-dark" placeholder="First name">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="last_name" class="form-control border-dark" placeholder="Last name"> 
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Date of Birth
                </p>
                <!-- Day -->
                <div class="col-md-4 mb-3">
                    <select name="day" class="form-control border-dark">
                        <option value="">Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Month -->
                <div class="col-md-4 mb-3">
                    <select name="month" class="form-control border-dark">
                        <option value="">Month</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                        @endfor
                    </select>
                </div>

                <!-- Year -->
                <div class="col-md-4 mb-3">
                    <select name="year" class="form-control border-dark">
                        <option value="">Year</option>
                        @for ($i = date('Y'); $i >= 1990; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <input type="text" name="phone" class="form-control border-dark" placeholder="Phone Number">
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">Gender</p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="gender" id="genderMale" value="male">
                        <label class="form-check-label custom-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="gender" id="genderFemale" value="female">
                        <label class="form-check-label custom-label" for="genderFemale">Female</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Did you have a Spouse/De Facto during this financial year?
                </p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="has_spouse" id="spouseYes" value="yes">
                        <label class="form-check-label custom-label" for="spouseYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="has_spouse" id="spouseNo" value="no">
                        <label class="form-check-label custom-label" for="spouseNo">No</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Will you be required to complete an Australian Tax Return in the future?
                </p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="future_tax_return" id="futureTaxYes" value="yes">
                        <label class="form-check-label custom-label" for="futureTaxYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="future_tax_return" id="futureTaxNo" value="no">
                        <label class="form-check-label custom-label" for="futureTaxNo">No</label>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="choosing-business-type_section mb-4">
        <h2 class="choosing-business-type-title">Residency Information</h2>
        <div class="choosing-business-type-form-box container">
            <div class="row mb-5 grin_box_border text-center py-4">
                <p class="choosing-business-type-text">
                    Do you have Australian Citizenship?
                </p>
                <div class="col mt-3 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="australian_citizenship" id="citizenshipYes" value="yes">
                        <label class="form-check-label custom-label" for="citizenshipYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="australian_citizenship" id="citizenshipNo" value="no">
                        <label class="form-check-label custom-label" for="citizenshipNo">No</label>
                    </div>
                </div>
            </div>

            <!-- Section that only appears if "No" is selected. -->
            <div class="row mb-3" id="nonCitizenSection" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <select class="form-control" name="visa_type" id="visaSelect">
                            <option value="">What type of visa do you have (eg. 417, 457, NZ citizen)?</option>
                            <option value="417">417 - Working Holiday Visa</option>
                            <option value="457">457 - Temporary Work Visa New Zealand citizen</option>
                            <option value="462">462 - Work and Holiday Visa</option>
                            <option value="416">416 Special Program Visa</option>
                            <option value="403">403 - Seasonal Work Visa</option>
                            <option value="other">Other (please specify)</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3" id="otherVisaInput" style="display: none;">
                        <input type="text" name="other_visa_type" class="form-control border-dark" placeholder="What is your country of citizenship?">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="choosing-business-type-text">
                            Did you live or stay in one place continuously for more than 183 days, during your stay in Australia?
                        </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="long_stay_183" id="stay183Yes" value="yes">
                            <label class="form-check-label custom-label" for="stay183Yes">Yes</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="long_stay_183" id="stay183No" value="no">
                            <label class="form-check-label custom-label" for="stay183No">No</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="choosing-business-type-text">Date of arrival in Australia</p>

                    <!-- Month -->
                    <div class="col-md-6 mb-3">
                        <select name="arrival_month" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Year -->
                    <div class="col-md-6 mb-3">
                        <select name="arrival_year" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($i = date('Y'); $i >= 1990; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="choosing-business-type-text">Date of departure from Australia (if applicable)</p>
                    <!-- Month -->
                    <div class="col-md-6 mb-3">
                        <select name="departure_month" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Year -->
                    <div class="col-md-6 mb-3">
                        <select name="departure_year" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($i = date('Y'); $i >= 1990; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <select name="stay_purpose" class="form-control border-dark">
                            <option value="">What was the primary purpose of your stay in Australia?</option>
                            <option value="holiday">Holiday</option>
                            <option value="work">Work</option>
                            <option value="study">Study</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <p class="choosing-business-type-text">
                        Did you live in Australia for the full tax year (1 July 2024 – 30 June 2025)?
                    </p>
                    <div class="col-md-6 mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="full_tax_year" id="taxYearYes" value="yes">
                            <label class="form-check-label custom-label" for="taxYearYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="full_tax_year" id="taxYearNo" value="no">
                            <label class="form-check-label custom-label" for="taxYearNo">No</label>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                <!-- Section that only appears if "No" is selected. -->
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Home Address
                </p>
                <div class="grin_box_border">

                    <div class="col-md-6">
                        <input type="text" name="home_address" class="form-control border-dark" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Postal Address
                </p>
                <div class="grin_box_border">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="choosing-business-type-text">
                                Is this the same as your home address?
                            </p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="same_as_home_address" id="sameAddressYes" value="yes">
                                <label class="form-check-label custom-label" for="sameAddressYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="same_as_home_address" id="sameAddressNo" value="no">
                                <label class="form-check-label custom-label" for="sameAddressNo">No</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="home_address" class="form-control border-dark" placeholder=" Postal Address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    Education and Other Debts
                </p>
                <div class="grin_box_border">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">
                                Do you have any HELP, TSL (now known as AASL), VSL or SSL debt?
                            </p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="has_education_debt" id="eduDebtYes" value="yes">
                                <label class="form-check-label custom-label" for="eduDebtYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="has_education_debt" id="eduDebtNo" value="no">
                                <label class="form-check-label custom-label" for="eduDebtNo">No</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">
                                Do you have any Student Financial Supplement Scheme (SFSS) debt?
                            </p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="has_sfss_debt" id="sfssDebtYes" value="yes">
                                <label class="form-check-label custom-label" for="sfssDebtYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input custom-radio" type="radio" name="has_sfss_debt" id="sfssDebtNo" value="no">
                                <label class="form-check-label custom-label" for="sfssDebtNo">No</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="text" name="other_tax_debts" class="form-control border-dark" placeholder="Do you have any other tax-related debts (such as Child Support Debts or Family Tax Assistance Debts)?">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <p class="choosing-business-type-text">
                    My Occupation
                </p>
                <div class="grin_box_border py-4 px-3">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="choosing-business-type-text">
                                What do you do for a living?
                            </p>
                            <select class="form-control" name="occupation" id="occupationSelect">
                                <option value="">Choose</option>
                                <option value="accountant">Accountant</option>
                                <option value="manager">Manager</option>
                                <option value="nurse">Nurse</option>
                                <option value="electrician">Electrician</option>
                                <option value="retail_clerk">Retail clerk</option>
                                <option value="student">Student</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="otherOccupationField" style="display: none;">
                        <div class="col-md-6">
                            <input type="text" name="other_occupation" class="form-control border-dark" placeholder="What do you do for a living?">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="col-12 text-end mb-5">
        <button class="btn navbar_btn" type="submit">Save</button>
    </div>

</form>

<script>
    // Citizenship
    const yesRadio = document.getElementById("citizenshipYes");
    const noRadio = document.getElementById("citizenshipNo");
    const extraSection = document.getElementById("nonCitizenSection");

    function toggleExtraSection() {
        extraSection.style.display = noRadio.checked ? "block" : "none";
    }
    toggleExtraSection();
    yesRadio?.addEventListener("change", toggleExtraSection);
    noRadio?.addEventListener("change", toggleExtraSection);
</script>