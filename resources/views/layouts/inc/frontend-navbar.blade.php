
  <!-- Header Start -->
  <header class="navigation">
    <div class="header-top">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-2 col-md-4">
            <div
              class="header-top-socials text-center text-lg-left text-md-left"
            >
              <a
                href="https://www.facebook.com/themefisher"
                aria-label="facebook"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a href="https://twitter.com/themefisher" aria-label="twitter"
                ><i class="fab fa-twitter"></i
              ></a>
              <a href="https://github.com/themefisher/" aria-label="github"
                ><i class="fab fa-github"></i
              ></a>
            </div>
          </div>
          <div
            class="col-lg-10 col-md-8 text-center text-lg-right text-md-right"
          >
            <div class="header-top-info mb-2 mb-md-0">
              <a href="tel:+23-345-67890"
                >Call Us : <span>+23-345-67890</span></a
              >
              <a href="mailto:support@gmail.com"
                ><i class="fas fa-envelope mr-2"></i
                ><span>support@gmail.com</span></a
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="navbar">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg px-0 py-4">
              <a class="navbar-brand" href="{{ url('/')}}">
                <img src="{{ asset('assets/images/phil-logo.png')}}" width="200px" height="auto" alt="">
              </a>

              <button
                class="navbar-toggler collapsed"
                type="button"
                data-toggle="collapse"
                data-target="#navbarsExample09"
                aria-controls="navbarsExample09"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="fa fa-bars"></span>
              </button>

              <div
                class="collapse navbar-collapse text-center"
                id="navbarsExample09"
              >
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/')}}">Home</a>
                  </li>
                  <li class="nav-item dropdown @@about">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="dropdown03"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      >About <i class="fas fa-chevron-down small"></i
                    ></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                      <li>
                        <a class="dropdown-item @@company" href="{{ url('about')}}"
                          >Our company</a
                        >
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item @@service">
                    <a class="nav-link" href="{{ url('services')}}">Services</a>
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

                  <li class="nav-item dropdown @@blog">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      id="dropdown05"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      >News & Events <i class="fas fa-chevron-down small"></i
                    ></a>
                  </li>
                  <li class="nav-item @@contact">
                    <a class="nav-link" href="contact.html">Contact</a>
                  </li>

                    <li class="nav-item @@contact">
                    @guest
                        <a class="nav-link" href="{{ route('login')}}">Login</a>
                    </li>
                    <li class="nav-item @@contact">
                        <a class="nav-link" href="{{ route('register')}}">Register</a>
                    </li>
                    @else
                        <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout')}}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest


                </ul>

                <div class="my-2 my-md-0 ml-lg-4 text-center">
                  <a
                    href="{{ url('applicant/apply-job')}}"
                    class="btn btn-solid-border btn-round-full"
                    >Apply Now</a
                  >
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header Close -->
