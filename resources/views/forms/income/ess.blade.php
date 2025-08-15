<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Employee Share Schemes (ESS)</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <p class="choosing-business-type-text">
        Enter the details of any Employee Share Schemes (ESS) you received. If a field does not apply to you, please leave it blank.
    </p>

    @php
        $essData = old('ess', $incomes->ess ?? [[]]); // если пусто, хотя бы один пустой блок
    @endphp

    <div id="essContainer">
        @foreach($essData as $i => $ess)
        <div class="grin_box_border mb-4 ess-block" data-index="{{ $i }}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Discount from taxed upfront schemes - eligible for reduction</label>
                    <input type="text" name="ess[{{ $i }}][discount_upfront_eligible]" class="form-control border-dark"
                           value="{{ $ess['discount_upfront_eligible'] ?? '' }}" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Discount from taxed upfront schemes - not eligible for reduction</label>
                    <input type="text" name="ess[{{ $i }}][discount_upfront_not_eligible]" class="form-control border-dark"
                           value="{{ $ess['discount_upfront_not_eligible'] ?? '' }}" placeholder="00.00$">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Discount from deferral schemes</label>
                    <input type="text" name="ess[{{ $i }}][discount_deferral]" class="form-control border-dark"
                           value="{{ $ess['discount_deferral'] ?? '' }}" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label>TFN amounts withheld from discount</label>
                    <input type="text" name="ess[{{ $i }}][tfn_withheld]" class="form-control border-dark"
                           value="{{ $ess['tfn_withheld'] ?? '' }}" placeholder="00.00$">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Foreign source discounts</label>
                    <input type="text" name="ess[{{ $i }}][foreign_discounts]" class="form-control border-dark"
                           value="{{ $ess['foreign_discounts'] ?? '' }}" placeholder="00.00$">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Employee share scheme foreign tax paid</label>
                    <input type="text" name="ess[{{ $i }}][foreign_tax_paid]" class="form-control border-dark"
                           value="{{ $ess['foreign_tax_paid'] ?? '' }}" placeholder="00.00$">
                </div>
            </div>
            <button type="button" class="btn btn_delete remove-ess">Delete</button>
        </div>
        @endforeach
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn_add" id="btnAddESS">
                <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Add another scheme
            </button>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const essContainer = document.getElementById("essContainer");
    const btnAddESS = document.getElementById("btnAddESS");

    function updateIndices() {
        essContainer.querySelectorAll('.ess-block').forEach((block, i) => {
            block.dataset.index = i;
            block.querySelectorAll('input').forEach(input => {
                const nameParts = input.name.split(']');
                nameParts[0] = `ess[${i}`;
                input.name = nameParts.join(']');
            });
        });
    }

    btnAddESS.addEventListener("click", function () {
        const blocks = essContainer.querySelectorAll(".ess-block");
        const lastBlock = blocks[blocks.length - 1];
        const clone = lastBlock.cloneNode(true);

        clone.querySelectorAll("input").forEach(input => input.value = '');
        essContainer.appendChild(clone);
        updateIndices();
    });

    essContainer.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-ess")) {
            const blocks = essContainer.querySelectorAll(".ess-block");
            if (blocks.length > 1) {
                e.target.closest(".ess-block").remove();
                updateIndices();
            } else {
                alert("You must have at least one ESS block.");
            }
        }
    });
});
</script>
