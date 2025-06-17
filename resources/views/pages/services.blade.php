@extends('layouts.app')

@section('content')
<section id="services_banner" class="section_py">
    <div class="container">
        <h2>
            Our Services – Stress-Free Tax Returns for Australians
        </h2>
    </div>
</section>
<section id="faq" class="section_mb py-5">
    <h2 class="title">Frequently Asked Questions</h2>
    <div class="container">
      <div class="row g-4"> 
        <div class="col-md-6">
          <div class="accordion" id="faqLeft">
            @for ($i = 1; $i <= 4; $i++)
              <div class="accordion-item border rounded">
                <h2 class="accordion-header" id="heading{{ $i }}">
                  <button class="accordion-button collapsed bg-white" type="button"
                          data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}">
                    Question {{ $i }}
                  </button>
                </h2>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                     data-bs-parent="#faqLeft">
                  <div class="accordion-body">
                    Answer {{ $i }}
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </div>
  
        <div class="col-md-6">
          <div class="accordion" id="faqRight">
            @for ($i = 5; $i <= 8; $i++)
              <div class="accordion-item border rounded shadow-sm">
                <h2 class="accordion-header" id="heading{{ $i }}">
                  <button class="accordion-button collapsed bg-white" type="button"
                          data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}">
                    Question {{ $i }}
                  </button>
                </h2>
                <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                     data-bs-parent="#faqRight">
                  <div class="accordion-body">
                    Answer {{ $i }}
                  </div>
                </div>
              </div>
            @endfor
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
@endsection