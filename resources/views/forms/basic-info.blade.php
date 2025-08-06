<form action="{{ isset($basicInfo) ? route('basic-info.update', $basicInfo->id) : route('basic-info.store') }}" method="POST">
    @csrf
    @if(isset($basicInfo))
        @method('PUT')
    @endif

    <section class="choosing-business-type_section">
        <h2 class="choosing-business-type-title">Please confirm your details</h2>
        <p class="choosing-business-type-text text-center">
            Enter the personal information we need to verify your identity and begin your tax refund application.
        </p>
        <div class="choosing-business-type-form-box">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <input type="text" name="first_name" class="form-control border-dark" placeholder="First name"
                        value="{{ old('first_name', $basicInfo->first_name ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="last_name" class="form-control border-dark" placeholder="Last name"
                        value="{{ old('last_name', $basicInfo->last_name ?? '') }}">
                </div>
            </div>

            <div class="row mb-3">
                <p class="choosing-business-type-text">Date of Birth</p>
                <!-- Day -->
                <div class="col-md-4 mb-3">
                    <select name="day" class="form-control border-dark">
                        <option value="">Day</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}" {{ old('day', $basicInfo->day ?? '') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
                <!-- Month -->
                <div class="col-md-4 mb-3">
                    <select name="month" class="form-control border-dark">
                        <option value="">Month</option>
                        @for ($i = 1; $i <= 12; $i++)
                            @php $monthName = DateTime::createFromFormat('!m', $i)->format('F'); @endphp
                            <option value="{{ $i }}" {{ old('month', $basicInfo->month ?? '') == $i ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endfor
                    </select>
                </div>
                <!-- Year -->
                <div class="col-md-4 mb-3">
                    <select name="year" class="form-control border-dark">
                        <option value="">Year</option>
                        @for ($i = date('Y'); $i >= 1990; $i--)
                            <option value="{{ $i }}" {{ old('year', $basicInfo->year ?? '') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <input type="text" name="phone" class="form-control border-dark" placeholder="Phone Number"
                        value="{{ old('phone', $basicInfo->phone ?? '') }}">
                </div>
            </div>

            <div class="row mb-3">
                <p class="choosing-business-type-text">Gender</p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="gender" id="genderMale" value="male"
                            {{ old('gender', $basicInfo->gender ?? '') == 'male' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="genderMale">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="gender" id="genderFemale" value="female"
                            {{ old('gender', $basicInfo->gender ?? '') == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="genderFemale">Female</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <p class="choosing-business-type-text">Did you have a Spouse/De Facto during this financial year?</p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="has_spouse" id="spouseYes" value="yes"
                            {{ old('has_spouse', $basicInfo->has_spouse ?? '') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="spouseYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="has_spouse" id="spouseNo" value="no"
                            {{ old('has_spouse', $basicInfo->has_spouse ?? '') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="spouseNo">No</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <p class="choosing-business-type-text">Will you be required to complete an Australian Tax Return in the future?</p>
                <div class="col-md-6 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="future_tax_return" id="futureTaxYes" value="yes"
                            {{ old('future_tax_return', $basicInfo->future_tax_return ?? '') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="futureTaxYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="future_tax_return" id="futureTaxNo" value="no"
                            {{ old('future_tax_return', $basicInfo->future_tax_return ?? '') == '0' ? 'checked' : '' }}>
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
                <p class="choosing-business-type-text">Do you have Australian Citizenship?</p>
                <div class="col mt-3 mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="australian_citizenship" id="citizenshipYes" value="yes"
                            {{ old('australian_citizenship', $basicInfo->australian_citizenship ?? '') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="citizenshipYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input custom-radio" type="radio" name="australian_citizenship" id="citizenshipNo" value="no"
                            {{ old('australian_citizenship', $basicInfo->australian_citizenship ?? '') == '0' ? 'checked' : '' }}>
                        <label class="form-check-label custom-label" for="citizenshipNo">No</label>
                    </div>
                </div>
            </div>

            <!-- Non-citizen section -->
            <div class="row mb-3" id="nonCitizenSection" style="display: {{ old('australian_citizenship', $basicInfo->australian_citizenship ?? '') == 'no' ? 'block' : 'none' }};">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <select class="form-control" name="visa_type" id="visaSelect">
                            <option value="">What type of visa do you have?</option>
                            <option value="417" {{ old('visa_type', $basicInfo->visa_type ?? '') == '417' ? 'selected' : '' }}>417 - Working Holiday</option>
                            <option value="457" {{ old('visa_type', $basicInfo->visa_type ?? '') == '457' ? 'selected' : '' }}>457 - Temporary Work</option>
                            <option value="other" {{ old('visa_type', $basicInfo->visa_type ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3" id="otherVisaInput" style="display: {{ old('visa_type', $basicInfo->visa_type ?? '') == 'other' ? 'block' : 'none' }};">
                        <input type="text" name="other_visa_type" class="form-control border-dark" placeholder="Specify visa type"
                            value="{{ old('other_visa_type', $basicInfo->other_visa_type ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <p class="choosing-business-type-text">Did you stay in one place >183 days?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="long_stay_183" id="stay183Yes" value="yes"
                                {{ old('long_stay_183', $basicInfo->long_stay_183 ?? '') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="stay183Yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="long_stay_183" id="stay183No" value="no"
                                {{ old('long_stay_183', $basicInfo->long_stay_183 ?? '') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="stay183No">No</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <p class="choosing-business-type-text">Date of arrival in Australia</p>
                    <div class="col-md-6 mb-3">
                        <select name="arrival_month" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($i = 1; $i <= 12; $i++)
                                @php $monthName = DateTime::createFromFormat('!m', $i)->format('F'); @endphp
                                <option value="{{ $i }}" {{ old('arrival_month', $basicInfo->arrival_month ?? '') == $i ? 'selected' : '' }}>
                                    {{ $monthName }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select name="arrival_year" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($i = date('Y'); $i >= 1990; $i--)
                                <option value="{{ $i }}" {{ old('arrival_year', $basicInfo->arrival_year ?? '') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <p class="choosing-business-type-text">Date of departure from Australia</p>
                    <div class="col-md-6 mb-3">
                        <select name="departure_month" class="form-control border-dark">
                            <option value="">Month</option>
                            @for ($i = 1; $i <= 12; $i++)
                                @php $monthName = DateTime::createFromFormat('!m', $i)->format('F'); @endphp
                                <option value="{{ $i }}" {{ old('departure_month', $basicInfo->departure_month ?? '') == $i ? 'selected' : '' }}>
                                    {{ $monthName }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <select name="departure_year" class="form-control border-dark">
                            <option value="">Year</option>
                            @for ($i = date('Y'); $i >= 1990; $i--)
                                <option value="{{ $i }}" {{ old('departure_year', $basicInfo->departure_year ?? '') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <select name="stay_purpose" class="form-control border-dark">
                            <option value="">Primary purpose of stay</option>
                            <option value="holiday" {{ old('stay_purpose', $basicInfo->stay_purpose ?? '') == 'holiday' ? 'selected' : '' }}>Holiday</option>
                            <option value="work" {{ old('stay_purpose', $basicInfo->stay_purpose ?? '') == 'work' ? 'selected' : '' }}>Work</option>
                            <option value="study" {{ old('stay_purpose', $basicInfo->stay_purpose ?? '') == 'study' ? 'selected' : '' }}>Study</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <p class="choosing-business-type-text">Did you live in Australia for the full tax year?</p>
                    <div class="col-md-6 mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="full_tax_year" id="taxYearYes" value="yes"
                                {{ old('full_tax_year', $basicInfo->full_tax_year ?? '') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="taxYearYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="full_tax_year" id="taxYearNo" value="no"
                                {{ old('full_tax_year', $basicInfo->full_tax_year ?? '') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="taxYearNo">No</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Home Address -->
        <div class="row mb-3">
            <p class="choosing-business-type-text">Home Address</p>
            <div class="grin_box_border">
                <div class="col-md-6">
                    <input type="text" name="home_address" class="form-control border-dark" placeholder="Address"
                        value="{{ old('home_address', $basicInfo->home_address ?? '') }}">
                </div>
            </div>
        </div>

        <!-- Postal Address -->
        <div class="row mb-3">
            <p class="choosing-business-type-text">Postal Address</p>
            <div class="grin_box_border">
                <div class="row">
                    <div class="col-md-6">
                        <p class="choosing-business-type-text">Same as home address?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="same_as_home_address" id="sameAddressYes" value="yes"
                                {{ old('same_as_home_address', $basicInfo->same_as_home_address ?? '') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="sameAddressYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="same_as_home_address" id="sameAddressNo" value="no"
                                {{ old('same_as_home_address', $basicInfo->same_as_home_address ?? '') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="sameAddressNo">No</label>
                        </div>
                    </div>
                    <div class="col-md-6" id="postalAddressField" style="display: {{ old('same_as_home_address', $basicInfo->same_as_home_address ?? '') == 'no' ? 'block' : 'none' }};">
                        <input type="text" name="postal_address" class="form-control border-dark" placeholder="Postal Address"
                            value="{{ old('postal_address', $basicInfo->postal_address ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Education and Other Debts -->
        <div class="row mb-3">
            <p class="choosing-business-type-text">Education and Other Debts</p>
            <div class="grin_box_border">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">HELP/TSL/VSL/SSL debt?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="has_education_debt" id="eduDebtYes" value="yes"
                                {{ old('has_education_debt', $basicInfo->has_education_debt ?? '') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="eduDebtYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="has_education_debt" id="eduDebtNo" value="no"
                                {{ old('has_education_debt', $basicInfo->has_education_debt ?? '') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="eduDebtNo">No</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="choosing-business-type-text">SFSS debt?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="has_sfss_debt" id="sfssDebtYes" value="yes"
                                {{ old('has_sfss_debt', $basicInfo->has_sfss_debt ?? '') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="sfssDebtYes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input custom-radio" type="radio" name="has_sfss_debt" id="sfssDebtNo" value="no"
                                {{ old('has_sfss_debt', $basicInfo->has_sfss_debt ?? '') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label custom-label" for="sfssDebtNo">No</label>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="text" name="other_tax_debts" class="form-control border-dark"
                            placeholder="Other tax-related debts?"
                            value="{{ old('other_tax_debts', $basicInfo->other_tax_debts ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Occupation -->
        <div class="row mb-3">
            <p class="choosing-business-type-text">My Occupation</p>
            <div class="grin_box_border py-4 px-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <select class="form-control" name="occupation" id="occupationSelect">
                            <option value="">Occupation</option>
                            <option value="accountant" {{ old('occupation', $basicInfo->occupation ?? '') == 'accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="manager" {{ old('occupation', $basicInfo->occupation ?? '') == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="student" {{ old('occupation', $basicInfo->occupation ?? '') == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="other" {{ old('occupation', $basicInfo->occupation ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row" id="otherOccupationField" style="display: {{ old('occupation', $basicInfo->occupation ?? '') == 'other' ? 'block' : 'none' }};">
                    <div class="col-md-6">
                        <input type="text" name="other_occupation" class="form-control border-dark" placeholder="Specify occupation"
                            value="{{ old('other_occupation', $basicInfo->other_occupation ?? '') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="d-flex justify-content-center mb-5">
        <button type="submit" class="btn btn-primary">
            {{ isset($basicInfo) ? 'Update Information' : 'Save Information' }}
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Citizenship toggle
        const citizenshipRadios = document.querySelectorAll('input[name="australian_citizenship"]');
        const nonCitizenSection = document.getElementById('nonCitizenSection');
        
        function toggleCitizenSection() {
            const selectedValue = document.querySelector('input[name="australian_citizenship"]:checked')?.value;
            nonCitizenSection.style.display = (selectedValue === 'no') ? 'block' : 'none';
        }

        // Visa type toggle
        const visaSelect = document.getElementById('visaSelect');
        const otherVisaInput = document.getElementById('otherVisaInput');
        
        function toggleVisaInput() {
            otherVisaInput.style.display = (visaSelect.value === 'other') ? 'block' : 'none';
        }

        // Postal address toggle
        const addressRadios = document.querySelectorAll('input[name="same_as_home_address"]');
        const postalAddressField = document.getElementById('postalAddressField');
        
        function togglePostalAddress() {
            const selectedValue = document.querySelector('input[name="same_as_home_address"]:checked')?.value;
            postalAddressField.style.display = (selectedValue === 'no') ? 'block' : 'none';
        }

        // Occupation toggle
        const occupationSelect = document.getElementById('occupationSelect');
        const otherOccupationField = document.getElementById('otherOccupationField');
        
        function toggleOccupationField() {
            otherOccupationField.style.display = (occupationSelect.value === 'other') ? 'block' : 'none';
        }

        // Set initial states
        toggleCitizenSection();
        toggleVisaInput();
        togglePostalAddress();
        toggleOccupationField();

        // Add event listeners
        citizenshipRadios.forEach(radio => radio.addEventListener('change', toggleCitizenSection));
        if(visaSelect) visaSelect.addEventListener('change', toggleVisaInput);
        addressRadios.forEach(radio => radio.addEventListener('change', togglePostalAddress));
        if(occupationSelect) occupationSelect.addEventListener('change', toggleOccupationField);
    });
</script>