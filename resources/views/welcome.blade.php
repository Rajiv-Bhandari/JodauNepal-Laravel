<!DOCTYPE html>
<html lang="en">

<head>
  <title>Jodau Nepal</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>

<link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('frontend/icomoon/icomoon.css')}}">

<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css')}}" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendor.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/style.css')}}">

<link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}">
<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin>
<link href="{{asset('https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700&family=Roboto+Slab&display=swap')}}"
  rel="stylesheet">

</head>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>

    </defs>
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>


  <nav class="main-menu d-flex navbar fixed-top navbar-expand-lg p-2 py-3 p-lg-4 py-lg-4 ">
    <div class="container-fluid">
      <div class="main-logo">
        <a href="index.html">
          <img src="{{asset('frontend/images/logo.png')}}" alt="logo" class="img-fluid">
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body justify-content-end">

          <ul class="navbar-nav menu-list list-unstyled align-items-lg-center d-flex gap-md-3 mb-0">

          <div class="d-none d-lg-flex align-items-center ms-5">
            <ul class="d-flex justify-content-end  list-unstyled m-0">
              <li>
              
                @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <!-- <a href="{{ url('/dashboard') }}">Dashboard</a> -->
                        @auth
                            @php
                                $userType = auth()->user()->usertype;
                            @endphp

                            <a href="{{ route(
                                match($userType) {
                                    \App\Enums\UserType::Admin => 'admin.dashboard',
                                    \App\Enums\UserType::Technician => 'dashboard.technician',
                                    \App\Enums\UserType::User => 'user.home',
                                }
                            ) }}">Dashboard</a>
                        @endauth
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark mx-3 p-3">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-dark mx-3 p-3">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </li>
            </ul>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="tabs-listing mt-4">
                        <nav>
                          <div class="nav nav-tabs d-flex justify-content-center border-0" id="nav-tab" role="tablist">
                            <button class="btn btn-outline-primary px-5 py-3 me-3 active" id="nav-sign-in-tab"
                              data-bs-toggle="tab" data-bs-target="#nav-sign-in" type="button" role="tab"
                              aria-controls="nav-sign-in" aria-selected="true">Log In</button>
                            <button class="btn btn-outline-primary px-5 py-3" id="nav-register-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                              aria-selected="false">Sign Up</button>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade active show" id="nav-sign-in" role="tabpanel"
                            aria-labelledby="nav-sign-in-tab">
                            <form id="form1" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="email"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="email" id="email" name="email" :value="old('email')" placeholder="Email" required autofocus autocomplete="username"
                                  class="form-control ps-3">
                                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="password"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input id="password"  placeholder="Password"  type="password"
                                name="password" required autocomplete="current-password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <div id="passwordHelpBlock" class="form-text text-center">
                                  <a href="{{ route('password.request') }}" class=" password">{{ __('Forgot your password?') }}</a>
                                </div>

                              </div>
                              <label class="py-3" for="remember_me">
                                <input type="checkbox" id="remember_me" required="" class="d-inline" name="remember">
                                <span class="label-body text-black">{{ __('Remember me') }}</span>
                              </label>
                              <div class="d-grid my-3">
                                <button class="btn btn-primary px-5 py-3" href="{{ route('login') }}">{{ __('Log in') }}</button>
                              </div>
                            </form>
                          </div>
                          <div class="tab-pane fade" id="nav-register" role="tabpanel"
                            aria-labelledby="nav-register-tab">
                            <form id="form2" class="form-group flex-wrap p-3 ">
                              <div class="form-input col-lg-12 my-4">
                                <label for="exampleInputEmail2"
                                  class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                  Address</label>
                                <input type="text" id="exampleInputEmail2" name="email" placeholder="Email"
                                  class="form-control ps-3">
                              </div>
                              <div class="form-input col-lg-12 my-4">
                                <label for="inputPassword2"
                                  class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                <input type="password" id="inputPassword2" placeholder="Password"
                                  class="form-control ps-3" aria-describedby="passwordHelpBlock">
                              </div>
                              <label class="py-3">
                                <input type="checkbox" required="" class="d-inline">
                                <span class="label-body text-black">I agree to the <a href="#"
                                    class="text-black password border-bottom">Privacy Policy</a>
                                </span>
                              </label>
                              <div class="d-grid my-3">
                                <button class="btn btn-primary px-5 py-3">Sign Up</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
            </ul>

          </div>

        </div>
      </div>

    </div>
 
  </nav>

  <section id="hero">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-lg-3 offset-md-2 padding-large ps-lg-0 pe-lg-5">
          <h2 class="display-2 fw-semibold">Great Online Platform</h2>
          <p class="secondary-font my-4 pb-2">Looking for skilled technicians to help with your projects? You're in the right place! Our job portal connects you with talented technicians ready to tackle any task, whether it's plumbing, electrical work, carpentry, or more. Post your job, browse profiles, and hire with confidence. Get started today and make your projects a reality!</p>
          <a href="{{ route('register-technician-form') }}" class="btn btn-dark">Register for Technician</a>
        </div>
        <div class="col-md-6 col-lg-7 d-block d-md-none d-lg-block p-0">
          <img src="{{asset('frontend/images/billboard-img.jpg')}}" alt="img" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <section id="service" class="padding-medium">
    <div class="container">
      <div class="text-center">
        <h2 class="display-5 fw-semibold">Why to <span class="text-primary"> choose us</span></h2>
        <p class="secondary-font">Get many features from us exactly what you are looking for.</p>
      </div>

      <div class="row g-md-4 mt-2">
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="fluent:notepad-person-24-regular"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Expert Technicians</h4>
              <p>Our highly skilled professionals bring extensive expertise to every job, ensuring precise and effective solutions tailored to your needs.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="la:certificate"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Reliable Service</h4>
              <p>Count on us for trustworthy assistance delivered with a commitment to reliability and integrity, providing peace of mind for every task.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="mdi:virtual-meeting"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Transparent Pricing</h4>
              <p>We believe in transparent pricing, offering clear and upfront cost estimates without any hidden fees, so you know exactly what to expect.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="mdi:school-online"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Quick Response</h4>
              <p>With our swift response times, we're always ready to address your technical issues promptly, minimizing downtime and inconvenience.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="uil:notebooks"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Quality Workmanship</h4>
              <p>Experience our dedication to quality workmanship, delivering exceptional service that meets the highest standards for lasting results you can rely on.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="uiw:global"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Customer Satisfaction</h4>
              <p>Your satisfaction is our priority, and we go above and beyond to ensure you're completely satisfied with every aspect of our service, striving to exceed your expectations.</p>
            </div>
          </div>
        </div>



      </div>
    </div>
  </section>

  <section id="benefits" style="background-color: #f5f5f5;">
    <div class="container padding-medium">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <h4 class="py-2 mt-3 m-0">Skilled Professionals</h4>
                    <p class="text-uppercase">Highly trained experts</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h4 class="py-2 mt-3 m-0">Dependable Support</h4>
                    <p class="text-uppercase">Reliable assistance</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h4 class="py-2 mt-3 m-0">Transparent Estimates</h4>
                    <p class="text-uppercase">Clear cost breakdowns</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <h4 class="py-2 mt-3 m-0">Prompt Solutions</h4>
                    <p class="text-uppercase">Quick problem resolution</p>
                </div>
            </div>
        </div>
    </div>
</section>

 

  <section id="testimonial" style="background-image:url(images/background-img.jpg); background-repeat: no-repeat; ">
    <div class="container padding-medium">
      <div class="text-center">
        <h2 class="display-5 fw-semibold">see what our <span class="text-primary"> users say</span></h2>
        <p class="secondary-font">Here we got the real proof to express our work. Our learners expressed our work.</p>
      </div>
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-1.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Rajiv Bhandari</h5>
                  <p class="text-muted">Php Developer</p>
                  <p class="lh-lg fw-bold text-black-50">"The job portal's intuitive interface streamlined my technician search, offering a seamless experience from start to finish.
                    Communication with technicians was hassle-free, thanks to the portal's efficient messaging system.
                    I appreciated the platform's attention to detail, ensuring a smooth hiring process and quality service."</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-2.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Sujash Joshi</h5>
                  <p class="text-muted">Digital Marketer</p>
                  <p class="lh-lg fw-bold text-black-50">"Navigating through technician profiles was effortless, thanks to the portal's user-friendly layout.
                    The portal's diverse range of skilled technicians provided ample options to fulfill my project requirements.
                    I found the portal's verification process reassuring, ensuring credibility and reliability in the technicians I hired."</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-3.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Min Chettri</h5>
                  <p class="text-muted">Photographer</p>
                  <p class="lh-lg fw-bold text-black-50">"The job portal's search filters allowed me to find technicians tailored to my specific needs with ease.
                    I was impressed by the prompt responses and professionalism of the technicians I connected with through the portal.
                    The feedback section provided valuable insights, helping me make informed decisions and choose the right technician for my project."</p>
                </div>
              </div>


            </div>

            <div class="swiper-pagination"></div>

          </div>
        </div>
      </div>
    </div>


  </section>

  <footer id="footer">
    <div class="container padding-medium ">
      <div class="row">
        <div class="col-md-4 my-3">
          <h5 class="text-uppercase fw-bold mb-4">Contact us</h5>
          <p><iconify-icon class="social-icon text-primary fs-5 me-2" icon="mdi:location"
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Address: </span> Swoyambhu,
            Kathmandu, Nepal</p>
          <p><iconify-icon class="social-icon text-primary fs-5 me-2" icon="solar:phone-bold"
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Phone: </span> 9802263597</p>
          <p><iconify-icon class="social-icon text-primary fs-5 me-2" icon="ic:baseline-email"
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Email: </span>
            bhandarirajiv22@gmail.com
          </p>
        </div>
        <div class="col-md-2 my-3">
          <div class="footer-menu">
            <h5 class="text-uppercase fw-bold mb-4">Links</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="{{ route('login') }}" class="footer-link">Login</a>
              </li>
              <li class="menu-item mb-2">
                <a href="{{ route('register') }}" class="footer-link">Regsiter</a>
              </li>
              <li class="menu-item mb-2">
                <a href="{{ route('register-technician-form') }}" class="footer-link">Join as our Technician</a>
              </li>
              <li class="menu-item mb-2">
                <a href="{{ route('user.booking') }}" class="footer-link">Your Bookings</a>
              </li>
              <li class="menu-item mb-2">
                <a href="{{ route('user.home') }}" class="footer-link">Analytics</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 my-3">
          <div class="footer-menu">
            <h5 class="text-uppercase fw-bold mb-4">support</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#">FAQs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#">Support</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="footer-menu">
            <h5 class="text-uppercase fw-bold mb-4">Follow us</h5>
            <div class="social-links mt-4">
              <ul class="d-flex list-unstyled gap-3">
                <li class="social">
                  <a href="#">
                    <iconify-icon class="social-icon fs-4 me-2" icon="ri:facebook-fill"></iconify-icon>
                  </a>
                </li>
                <li class="social">
                  <a href="#">
                    <iconify-icon class="social-icon fs-4 me-2" icon="ri:twitter-fill"></iconify-icon>
                  </a>
                </li>
                <li class="social">
                  <a href="#">
                    <iconify-icon class="social-icon fs-4 me-2" icon="ri:pinterest-fill"></iconify-icon>
                  </a>
                </li>
                <li class="social">
                  <a href="#">
                    <iconify-icon class="social-icon fs-4 me-2" icon="ri:instagram-fill"></iconify-icon>
                  </a>
                </li>
                <li class="social">
                  <a href="#">
                    <iconify-icon class="social-icon fs-4 me-2" icon="ri:youtube-fill"></iconify-icon>
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="footer-bottom">
    <hr class="m-0 text-black-50">
    <div class="container py-3">
      <div class="row mt-3">
        <div class="col-md-6 copyright">
          <p>© 2024 Jodau Nepal. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <p>Version: <a target="_blank"
              class="text-decoration-underline fw-bold"> 1.0</a> </p>
        </div>
      </div>
    </div>
  </div>


 <script src="{{asset('frontend/js/jquery-1.11.0.min.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
   crossorigin="anonymous"></script>
 <script src="{{asset('frontend/js/plugins.js')}}"></script>
 <script src="{{asset('frontend/js/script.js')}}"></script>
 <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>