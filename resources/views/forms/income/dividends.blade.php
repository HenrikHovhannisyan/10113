<section>
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="form_title">Dividends</h4>
            <img src="{{ asset('img/icons/help.png') }}" alt="Help">
        </div>
        <p class="choosing-business-type-text">
            Enter the dividends you received from all investments. Find this on your dividend statements or online share accounts. If you have joint (shared) ownership, ensure you adjust the number of account holders.
        </p>
        <div class="grin_box_border">
            <p class="choosing-business-type-text">
                Enter each investment separately. If you had more than one investment paying dividends, click the “add another dividend” button below.
            </p>
            <div id="dividendsContainer">
                @php
                    // Determine number of dividend blocks to display
                    $dividendCount = max(
                        count(old('dividend_account_holders', [])),
                        isset($incomes) ? count($incomes->dividend_account_holders ?? []) : 0,
                        1
                    );
                @endphp
                
                @for($i = 0; $i < $dividendCount; $i++)
                <section class="dividends-block" data-index="{{ $i }}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Number of Account Holders</p>
                            <input 
                                type="number" 
                                name="dividend_account_holders[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="1"
                                value="{{ old("dividend_account_holders.$i", $incomes->dividend_account_holders[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total unfranked amount</p>
                            <input 
                                type="number" 
                                name="unfranked_amount[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("unfranked_amount.$i", $incomes->unfranked_amount[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total franked amount</p>
                            <input 
                                type="number" 
                                name="franked_amount[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("franked_amount.$i", $incomes->franked_amount[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total franking credits</p>
                            <input 
                                type="number" 
                                name="franking_credits[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("franking_credits.$i", $incomes->franking_credits[$i] ?? '') }}"
                            >
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="choosing-business-type-text">Total tax amounts withheld</p>
                            <input 
                                type="number" 
                                name="dividend_tax_withheld[{{ $i }}]" 
                                class="form-control border-dark" 
                                placeholder="00.00$"
                                value="{{ old("dividend_tax_withheld.$i", $incomes->dividend_tax_withheld[$i] ?? '') }}"
                            >
                        </div>
                    </div>
                </section>
                @endfor
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn_add btn_add_dividend">
                        <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another dividend
                    </button>
                    <button type="button" class="btn btn_delete btn_delete_dividend">
                        Delete dividend
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const dividendsContainer = document.getElementById("dividendsContainer");
    const addDividendBtn = document.querySelector(".btn_add_dividend");
    const deleteDividendBtn = document.querySelector(".btn_delete_dividend");

    function updateInputNames(section, index) {
        const inputNames = [
            'dividend_account_holders',
            'unfranked_amount',
            'franked_amount',
            'franking_credits',
            'dividend_tax_withheld'
        ];
        
        inputNames.forEach(name => {
            const input = section.querySelector(`input[name^="${name}"]`);
            if(input) {
                input.name = `${name}[${index}]`;
            }
        });
    }

    function clearInputs(section) {
        section.querySelectorAll("input").forEach(input => {
            input.value = "";
        });
    }

    addDividendBtn.addEventListener("click", () => {
        const blocks = dividendsContainer.querySelectorAll(".dividends-block");
        const lastBlock = blocks[blocks.length - 1];
        const newBlock = lastBlock.cloneNode(true);
        const newIndex = blocks.length;

        newBlock.dataset.index = newIndex;
        clearInputs(newBlock);
        updateInputNames(newBlock, newIndex);
        dividendsContainer.appendChild(newBlock);
    });

    deleteDividendBtn.addEventListener("click", () => {
        const blocks = dividendsContainer.querySelectorAll(".dividends-block");
        if (blocks.length > 1) {
            blocks[blocks.length - 1].remove();
        }
    });
});
</script>