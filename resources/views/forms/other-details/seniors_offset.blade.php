<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Seniors And Pensioners (includes self-funded retirees)</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border mt-4 mb-5">
  <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Seniors Tax Offset - Marital Status</p>
    <select name="seniors_offset_status" class="form-control border-dark">
      <option value="">Choose</option>
      <option value="A">A: You were single, widowed, or separated</option>
      <option value="B">B: Both eligible for offset but lived apart (due to illness or nursing home)</option>
      <option value="C">C: Spouse not eligible for offset, lived apart (due to illness or nursing home)</option>
      <option value="D">D: Lived together and you are both eligible for this tax offset</option>
      <option value="E">E: Lived together but your spouse is ineligible to claim this tax offset</option>
    </select>
  </div>

  <div class="col-md-6 mb-3">
    <p class="choosing-business-type-text">Veterans (or Spouses of Veterans)</p>
    <select name="veteran_status" class="form-control border-dark">
      <option value="">Choose</option>
      <option value="V">V: Taxpayer is a veteran or war widow/er</option>
      <option value="W">W: Taxpayer is spouse of veteran</option>
      <option value="X">X: Taxpayer and spouse are both veterans</option>
    </select>
  </div>
</div>

</section>
