<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Income Tests</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <p class="choosing-business-type-text">
        These questions are required by new ATO rules.
    </p>
    <div class="grin_box_border mb-5">
        <p class="choosing-business-type-text mb-3">
            If any questions don't apply to you (or if you are unsure), you can leave them blank.
        </p>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="it3" class="choosing-business-type-text">IT3 Tax-Free Government Pensions</label>
                <input type="text" id="it3" name="it3" class=" form-control border-dark" placeholder="00.00$">
            </div>
            <div class="col-md-6">
                <label for="it4" class="choosing-business-type-text">IT4 Target Foreign Income</label>
                <input type="text" id="it4" name="it4" class=" form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="it5" class="choosing-business-type-text">IT5 Net Financial Investment Loss</label>
                <input type="text" id="it5" name="it5" class=" form-control border-dark" placeholder="00.00$">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="it7" class="choosing-business-type-text">IT7 Child support you paid</label>
                <input type="text" id="it7" name="it7" class=" form-control border-dark" placeholder="00.00$">
            </div>
        </div>
    </div>
</form>
