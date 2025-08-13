<section>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="form_title">Any other questions or documents to attach?</h4>
        <img src="{{ asset('img/icons/help.png') }}" alt="Help">
    </div>

    <div class="grin_box_border">
        <div class="col-md-6">
            <!-- Additional Questions -->
            <div class="mb-3">
                <label for="additional_questions" class="form-label">
                    Just add your questions or extra details here. After you sign your return, an accountant will read your notes, update your return, and reply to you if needed.
                </label>
                <input type="text"
                       id="additional_questions"
                       name="additional_questions"
                       class="form-control border-dark"
                       placeholder="..."
                       value="{{ old('additional_questions', $others->attach['additional_questions'] ?? '') }}">
            </div>

            <!-- File Uploads -->
            <div class="mt-3">
                <label class="choosing-business-type-text d-block mb-2">
                    Attach any other files or receipts
                </label>

                <input type="file" name="additional_file[]" id="additional_file" class="d-none" multiple />
                <button type="button" class="btn btn_add" id="additional_file_trigger">
                    <img src="{{ asset('img/icons/plus.png') }}" alt="plus"> Choose file
                </button>

                <div id="additional_file_name" class="choosing-business-type-text text-muted mb-0 mt-2">
                    @if(!empty($others->attach['additional_file']))
                        @foreach($others->attach['additional_file'] as $file)
                            <a href="{{ asset('storage/'.$file) }}" target="_blank">{{ basename($file) }}</a><br>
                        @endforeach
                    @else
                        No file chosen
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const additionalFileInput = document.getElementById("additional_file");
    const additionalFileTrigger = document.getElementById("additional_file_trigger");
    const additionalFileNameDisplay = document.getElementById("additional_file_name");

    // Trigger hidden file input
    additionalFileTrigger.addEventListener("click", () => additionalFileInput.click());

    // Display selected file names
    additionalFileInput.addEventListener("change", () => {
        const files = Array.from(additionalFileInput.files).map(f => f.name).join(", ");
        additionalFileNameDisplay.textContent = files || "No file chosen";
    });
</script>
