    <form>
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Tools and Equipment</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help" />
      </div>

      <p class="choosing-business-type-text">
        If you paid for tools and equipment used for your work, claim the costs here.
      </p>
      <p class="choosing-business-type-text">
        Please do not claim items that were paid for by an employer and don’t claim items if you were paid back for them later by an employer.
      </p>
      <div class="grin_box_border p-3 mb-3">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Add-up the items that cost $300 or LESS each</label
            >
            <input
              type="text"
              name="tools_under_300"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >In a few words, describe the tools and how they relate to your work. (eg. “Assorted hand tools and power tool bits required for my work”)</label
            >
            <textarea
              name="tools_under_300_desc"
              class="form-control border-dark"
              rows="3"
              placeholder="Text"
            ></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >Add-up the items that cost $301 or MORE each</label
            >
            <input
              type="text"
              name="tools_over_300"
              class="form-control border-dark"
              placeholder="00.00$"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >For tools that cost more than $300 each, please list all items incl. description, cost and date of purchase (eg. “air compressor $452.12, 18 Feb 2025, Bunnings”)</label
            >
            <textarea
              name="tools_over_300_desc"
              class="form-control border-dark"
              rows="3"
              placeholder="Text"
            ></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >What % of the time are the tools used for your work?</label
            >
            <input
              type="text"
              name="tools_percent_use"
              class="form-control border-dark"
              placeholder="0%"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="choosing-business-type-text"
              >What sort of records or evidence do you have? (eg. an invoice or receipt)</label
            >
            <select name="tools_evidence" class="form-select border-dark">
              <option value="">Choose</option>
              <option value="invoice">I: Invoice / Receipt</option>
              <option value="recorded">C: Actual recorded cost</option>
            </select>
          </div>
        </div>
      </div>
    </form>