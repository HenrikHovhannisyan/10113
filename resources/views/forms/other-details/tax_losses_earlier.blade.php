<form>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Tax Losses Of Earlier Income Years Claimed This Income Year</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>
    <div class="grin_box_border p-3 mb-4">
        <!-- Primary production losses -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="choosing-business-type-text mb-2" for="primary_losses_carried">
                    Primary production losses carried forward from earlier income years
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="primary_losses_carried" name="primary_losses_carried" placeholder="00.00$">
            </div>

            <div class="col-md-6">
                <label class="choosing-business-type-text mb-2" for="primary_losses_claimed">
                    Primary production losses claimed this income year
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="primary_losses_claimed" name="primary_losses_claimed" placeholder="00.00$">
            </div>
        </div>

        <!-- Non-primary production losses -->
        <div class="row">
            <div class="col-md-6">
                <label class="choosing-business-type-text mb-2" for="non_primary_losses_carried">
                    Non-primary production losses carried forward from earlier income years
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="non_primary_losses_carried" name="non_primary_losses_carried" placeholder="00.00$">
            </div>

            <div class="col-md-6">
                <label class="choosing-business-type-text mb-2" for="non_primary_losses_claimed">
                    Non-primary production losses claimed this income year
                </label>
                <input type="number" step="0.01" class="form-control border-dark" id="non_primary_losses_claimed" name="non_primary_losses_claimed" placeholder="00.00$">
            </div>
        </div>

    </div>

</form>