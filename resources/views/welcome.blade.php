<!DOCTYPE html>
<html lang="en">

<head>
  <title>jadu</title>
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

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-4">
          <span>Your <span class="text-primary"> cart</span></span>
          <span class="badge bg-primary rounded-circle pt-2 text-dark">3</span>
        </h4>

        <ul class="list-group mb-4">
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Marketing Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$120</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Strategy Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$80</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3 lh-sm">
            <div>
              <h6 class="my-0">Digital Course</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$50</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span class="fw-bold">Total (USD)</span>
            <strong>$250</strong>
          </li>
        </ul>

        <div class="d-grid my-5">
          <button class="btn btn-primary px-5 py-3" type="submit">Continue to checkout</button>
        </div>
      </div>
    </div>
  </div>

 @include('frontend.navbar')

  <section id="hero">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-lg-3 offset-md-2 padding-large ps-lg-0 pe-lg-5">
          <h2 class="display-2 fw-semibold">Great Online Platform</h2>
          <p class="secondary-font my-4 pb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
            fugit at quia
            tenetur expedita, consequuntur aspernatur explicabo earum odio.</p>
          <div>
            <form id="form" class="d-flex justify-content-between position-relative">
              <input type="text" name="email" placeholder="Search Your Courses ..." class="form-control w-100">
              <button class="btn btn-primary px-4 py-2 position-absolute end-0"
                style="height: -webkit-fill-available;"><iconify-icon icon="ion:search" class="fs-4 py-1"
                  style="vertical-align: middle;"></iconify-icon></button>
            </form>

          </div>
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
              <h4 class="py-2 m-0">Professional Instruction</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="la:certificate"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Certified Courses</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="mdi:virtual-meeting"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Learn Courses Online</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="mdi:school-online"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">5000+ Online Courses</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="uil:notebooks"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Free Online Ebooks</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4">
          <div class="services-element p-4 rounded-3 d-flex">
            <div>
              <iconify-icon class="service-icon fs-1" icon="uiw:global"></iconify-icon>
            </div>

            <div class="ps-3">
              <h4 class="py-2 m-0">Global Location</h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sint dolores cupiditate, commodi
                voluptatem corrupti voluptatibus quisquam officiis quod id.</p>
            </div>
          </div>
        </div>



      </div>
    </div>
  </section>

  <section id="register">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-6 ">
          <img src="images/register-img.png" alt="img" class="img-fluid">
        </div>
        <div class="col-md-4 ">
          <div class="mb-5 mt-5 mt-lg-0">
            <h2 class="display-5 fw-semibold"> Get Your <span class="text-primary">Skills Certificate</span></h2>
            <p class="secondary-font">Simple steps to get your quality skills certificate
              through WorldCourse.</p>
          </div>

          <form id="form">
            <input type="text" name="email" placeholder="Write Your Name*" class="form-control w-100 mb-4">
            <input type="email" name="email" placeholder="Write Your Email Address*" class="form-control w-100 mb-4">
            <button class="btn btn-primary px-5 py-3 mt-2"> Get Started now</button>
          </form>

        </div>

      </div>
    </div>
  </section>

  <section id="top-sell" class="padding-medium">
    <div class="container">

      <div class="text-center mb-5">
        <h2 class="display-5 fw-semibold">Check our <span class="text-primary">top selling courses</span></h2>
        <p class="secondary-font">Peoples are not only searching but buying these products.</p>
      </div>

      <div class="text-center mb-3">
        <p class="m-0">
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4  active" data-filter="*">All</button>
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4 " data-filter=".digital">Digital
            marketing</button>
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4 " data-filter=".web">Web design</button>
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4 " data-filter=".photo">Photography</button>
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4 " data-filter=".business">Bussiness</button>
          <button class="filter-button px-3 py-2 mt-2 rounded-pill me-4 " data-filter=".video">Video editing</button>
        </p>
      </div>

      <div class="isotope-container row">

        <div class="item digital col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">12 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item4.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Beginner</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">The Complete Package of Digital Marketing Courses</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item web col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">10 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item3.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Expert</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Top Marketing Strategy Courses - 15 Courses in 1</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">2D Course</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:half-star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item photo col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">15 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">All Level</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Digital Marketing Masterclass - Complete Guide</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">Wokka Stary</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item business col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">20 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item2.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Beginner</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Mega Digital Marketing Course A to Z - Full Course</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">Christin Hanby</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:half-star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-line" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item video col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">12 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item5.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Beginner</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">The Complete Package of Digital Marketing Courses</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item web col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">10 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item6.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Expert</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Top Marketing Strategy Courses - 15 Courses in 1</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">2D Course</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:half-star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-line" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item photo col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">15 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item7.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">All Level</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Digital Marketing Masterclass - Complete Guide</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">Wokka Stary</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>
        <div class="item business col-md-4 col-lg-3 my-5">
          <div class="z-1 position-absolute m-3">
            <span class="badge text-muted bg-primary">20 Weeks</span>
          </div>
          <div class="card position-relative">
            <a href="courses-details.html"><img src="images/item8.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <span class="badge text-muted bg-success mt-3 mb-1">Beginner</span>

              <a href="courses-details.html">
                <h5 class="py-2 m-0">Mega Digital Marketing Course A to Z - Full Course</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mb-2">
                  <p class="text-muted fw-semibold m-0 me-2">Christin Hanby</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:half-star-solid" class="text-primary"></iconify-icon>
                </span>

                <h4 class=" text-primary">$180.00 <span
                    class="fs-6 text-black opacity-25 text-decoration-line-through">240.00</span></h4>

                <div class="d-flex flex-wrap mt-2">
                  <a href="#" class=" btn btn-outline-dark text-capitalize me-2 px-4 py-3">Enroll Now</a>
                  <a href="#" class=" btn btn-outline-dark text-capitalize ">
                    <iconify-icon icon="mdi:heart-outline" class="fs-5 pt-1"></iconify-icon>
                  </a>
                </div>

              </div>

            </div>
          </div>
        </div>

      </div>


    </div>
  </section>

  <section id="achivement" style="background-color: #f5f5f5;">
    <div class="container padding-medium">
      <div class="row">
        <div class="col-md-3">
          <div class="text-center">
            <img src="images/topic.png" alt="img" class="img-fluid">
            <h4 class="py-2 mt-3 m-0">300+ Topics</h4>
            <p class="text-uppercase">choose your choice</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <img src="images/student.png" alt="img" class="img-fluid">
            <h4 class="py-2 mt-3 m-0">1000+ Students</h4>
            <p class="text-uppercase">bright future</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <img src="images/instruction.png" alt="img" class="img-fluid">
            <h4 class="py-2 mt-3 m-0">300+ Instructors</h4>
            <p class="text-uppercase">trained professionals</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <img src="images/award.png" alt="img" class="img-fluid">
            <h4 class="py-2 mt-3 m-0">120+ Awards</h4>
            <p class="text-uppercase">hard process</p>
          </div>
        </div>

      </div>
    </div>
  </section>

 

  <section id="testimonial" style="background-image:url(images/background-img.jpg); background-repeat: no-repeat; ">
    <div class="container padding-medium">
      <div class="text-center">
        <h2 class="display-5 fw-semibold">see what our <span class="text-primary"> learners say</span></h2>
        <p class="secondary-font">Here we got the real proof to express our work. Our learners expressed our work.</p>
      </div>
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-1.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Recco Gracia</h5>
                  <p class="text-muted">Web Developer</p>
                  <p class="lh-lg fw-bold text-black-50">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea. Consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt enim ad minim veniam”</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-2.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Georgie Maggie</h5>
                  <p class="text-muted">Digital Marketer</p>
                  <p class="lh-lg fw-bold text-black-50">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea. Consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt enim ad minim veniam”</p>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="text-center my-4">
                  <img src="images/reviewer-3.jpg" alt="img" class="img-fluid rounded-circle">
                  <h5 class="m-0 mt-2">Emmy Watson</h5>
                  <p class="text-muted">Photographer</p>
                  <p class="lh-lg fw-bold text-black-50">“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea. Consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt enim ad minim veniam”</p>
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
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Address: </span> 30 E Lake St,
            Chicago, USA</p>
          <p><iconify-icon class="social-icon text-primary fs-5 me-2" icon="solar:phone-bold"
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Phone: </span> (510) 710-3464</p>
          <p><iconify-icon class="social-icon text-primary fs-5 me-2" icon="ic:baseline-email"
              style="vertical-align:text-bottom"></iconify-icon> <span class="fw-bold">Email: </span>
            info@worldcourse.com
          </p>
        </div>
        <div class="col-md-2 my-3">
          <div class="footer-menu">
            <h5 class="text-uppercase fw-bold mb-4">Links</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">HEllo Rajiv</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">About us</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Courses</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Blogs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Contact</a>
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
          <p>© 2024 WorldCourse. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <p>Free HTML Template by <a href="https://templatesjungle.com/" target="_blank"
              class="text-decoration-underline fw-bold"> TemplatesJungle</a> </p>
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