<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Do you have any dependent children?</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border mb-5">
        <div class="col-md-6">
            <label class="choosing-business-type-text" for="dependent_children">
            If you have children who depend on you for financial support (even if they don't live with you), please enter the number of dependent children here.
            </label>
            <input
            type="number"
            min="0"
            class="form-control border-dark"
            id="dependent_children"
            name="dependent_children"
            placeholder="..."
            />
        </div>
    </div>
</form>