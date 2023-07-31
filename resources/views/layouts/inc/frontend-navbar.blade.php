<div class="global-navbar">
    <div class="container">
        <div class="row m-4">
            <div class="col-md-3">
                <a href="{{ url('/')}}">
                    <img src="{{ asset('assets/images/phil-logo.png')}}" class="w-100" alt="Logo">
                </a>
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/')}}">Home</a>
          </li>


          @php
              $country = App\Models\Country::where('navbar_status', '0')->where('status', '0')->get();
          @endphp


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Jobs
                </a>
                <ul class="dropdown-menu">
                    @foreach ($country as $countryitem)
                        <li><a class="dropdown-item" href="{{ url('jobs/'.$countryitem->slug) }}">{{ $countryitem->name }}</a></li>

                    @endforeach
                </ul>
            </li>


          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link">Apply Now</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
