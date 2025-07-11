<form>
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h4 class="form_title">Deferred Non-commercial Business Losses</h4>
    <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
  </div>

  <div class="grin_box_border mb-4">
    <div class="row">
      <!-- Partnership: investing -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from partnership activities - from carrying on a business of investing
        </p>
        <input type="number" step="0.01" name="partnership_investing" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Partnership: rental property -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from partnership activities - from carrying on a rental property business
        </p>
        <input type="number" step="0.01" name="partnership_rental" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Partnership: other -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from partnership activities - other
        </p>
        <input type="number" step="0.01" name="partnership_other" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Partnership: total -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from partnership activities
        </p>
        <input type="number" step="0.01" name="partnership_total" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Sole trader: investing -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from sole trader activities - from carrying on a business of investing
        </p>
        <input type="number" step="0.01" name="sole_investing" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Sole trader: rental property -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from sole trader activities - from carrying on a rental property business
        </p>
        <input type="number" step="0.01" name="sole_rental" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Sole trader: other -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Your share of deferred losses from sole trader activities - other
        </p>
        <input type="number" step="0.01" name="sole_other" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
    <div class="row">
      <!-- Sole trader: total -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">
          Deferred losses from sole trader activities
        </p>
        <input type="number" step="0.01" name="sole_total" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
    <div class="row">
      <!-- Primary production -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Primary production deferred losses</p>
        <input type="number" step="0.01" name="primary_production" class="form-control border-dark" placeholder="00.00$" />
      </div>

      <!-- Non-primary production -->
      <div class="col-md-6 mb-3">
        <p class="choosing-business-type-text">Non-primary production deferred losses</p>
        <input type="number" step="0.01" name="non_primary_production" class="form-control border-dark" placeholder="00.00$" />
      </div>
    </div>
  </div>
</form>
