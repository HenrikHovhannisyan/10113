<footer>
    <div class="container-fluid p-0" style="background: #FAFAFA; border-top: 1px solid #EEEEEE">
      <div class="container py-5">
        <div class="row">
            <div class="col-md-4 mb-3">
              <img src="{{ asset('img/footer-logo.png') }}" alt="logo" class="img-fluid">
              <div class="soc_links">
                <a href="#">
                    <img src="{{ asset('img/icons/facebook.png') }}" alt="facebook">
                </a>
                <a href="#">
                    <img src="{{ asset('img/icons/instagram.png') }}" alt="instagram">
                </a>
                <a href="#">
                    <img src="{{ asset('img/icons/x.png') }}" alt="x">
                </a>
              </div>
              <a href="#">Verify at www.tpb.gov.au</a>
            </div>
            <div class="col-md-4 mb-3">
              <ul class="nav flex-column gap-4">
                <li>
                  <a href="#">
                    <img src="{{ asset('img/icons/phone.png') }}" alt="phone">
                    <span>Phone: 1300 123 456</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="{{ asset('img/icons/email.png') }}" alt="email">
                    <span>Email: info@thesapphiregroup.com.au</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="{{ asset('img/icons/link.png') }}" alt="link">
                    <span>ABN: 11 685 404 406</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="{{ asset('img/icons/lock.png') }}" alt="lock">
                    <span>Registered Tax Agent – TPB No. 26303969</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img src="{{ asset('img/icons/card.png') }}" alt="card">
                    <span>Payments securely processed by Stripe</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 mb-3">
              <ul class="nav flex-column gap-4">
                <li>
                  <a href="{{ route('home') }}" class="navbar_link">
                    Home
                  </a>
                </li>
                <li>
                  <a href="{{ route('home') }}" class="navbar_link">
                    Services
                  </a>
                </li>
                <li>
                  <a href="{{ route('home') }}" class="navbar_link">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
      </div>
  </div>
  <div class="container-fluid p-0" style="background: #ffffff">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8 mb-3">
                <p>© {{ date('Y') }} The Sapphire Group. All rights reserved.</p>
            </div>
            <div class="col-md-4 mb-3">
                <div class="d-flex gap-4">
                    <a href="#" class="navbar_link">Privacy Policy</a>
                    <a href="#" class="navbar_link">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</footer>