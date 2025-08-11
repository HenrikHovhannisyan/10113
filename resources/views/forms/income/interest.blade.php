<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Interest</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>
        <p class="choosing-business-type-text">
            Enter the interest you received from all bank accounts. Find this on your bank statements or online banking. If you have joint (shared) accounts, ensure you adjust the number of account holders.
        </p>
        <div class="grin_box_border">
            <div id="interestContainer">
                @php
                    // Determine number of interest blocks to display
                    $interestCount = max(
                        count(old('account_holders', [])),
                        isset($incomes) ? count($incomes->account_holders ?? []) : 0,
                        1
                    );
                @endphp
                
                @for($i = 0; $i < $interestCount; $i++)
                <section class="interest-block" data-index="{{ $i }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Number of Account Holders</p>
                            <input 
                                type="number" 
                                name="account_holders[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="1"
                                value="{{ old("account_holders.$i", $incomes->account_holders[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Tax Withheld from interest (if any)</p>
                            <input 
                                type="number" 
                                name="interest_tax_withheld[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("interest_tax_withheld.$i", $incomes->interest_tax_withheld[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total Interest</p>
                            <input 
                                type="number" 
                                name="total_interest[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("total_interest.$i", $incomes->total_interest[$i] ?? '') }}"
                            >
                        </div>
                    </div>
                </section>
                @endfor
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add btn_add_interest">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another account
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_interest">
                        Delete account
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const interestContainer = document.getElementById("interestContainer");
    const addInterestBtn = document.querySelector(".btn_add_interest");
    const deleteInterestBtn = document.querySelector(".btn_delete_interest");

    function updateInputNames(section, index) {
        section.dataset.index = index;
        const map = {
            "account_holders": `account_holders[${index}]`,
            "interest_tax_withheld": `interest_tax_withheld[${index}]`,
            "total_interest": `total_interest[${index}]`
        };

        Object.entries(map).forEach(([key, name]) => {
            const input = section.querySelector(`input[name^="${key}"]`);
            if(input) {
                input.name = name;
            }
        });
    }

    function clearInputs(section) {
        section.querySelectorAll("input").forEach(input => {
            input.value = "";
        });
    }

    addInterestBtn.addEventListener("click", () => {
        const blocks = interestContainer.querySelectorAll(".interest-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);
        const newIndex = blocks.length;

        clearInputs(newBlock);
        updateInputNames(newBlock, newIndex);
        interestContainer.appendChild(newBlock);
    });

    deleteInterestBtn.addEventListener("click", () => {
        const blocks = interestContainer.querySelectorAll(".interest-block");
        if(blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });
});
</script>