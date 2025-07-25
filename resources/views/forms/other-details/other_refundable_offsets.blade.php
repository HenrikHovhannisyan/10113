<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Other Refundable Tax Offsets</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border p-3 mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="other_refundable_tax_offsets" class="form-label">Other refundable tax offsets</label>
                <input type="number" step="0.01" class="form-control border-dark" name="other_refundable_tax_offsets" placeholder="00.00$">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="other_refundable_tax_offsets_code" class="form-label">Other refundable tax offsets code</label>
                <select name="other_refundable_tax_offsets_code" class="form-control border-dark">
                    <option value="">Choose</option>
                    <option value="E">E: The exploration credit refundable tax offset is being claimed</option>
                    <option value="S">S: The tax paid by the trustee as a refundable tax offset for the principal beneficiary of a Special Beneficiary Trust</option>
                    <option value="M">M: Multiple offsets claimed</option>
                </select>
            </div>
        </div>
    </div>

</form>
