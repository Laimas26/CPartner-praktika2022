@extends('layouts.app')

@section('content')

<body>

  {{-- @include('layouts.navbar') --}}

  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Sveiki atvykę į <span>AutoDalys</span></h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Apie mus</a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <main id="main">


    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Apie mus</h2>
          <p>Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="https://free-images.com/lg/6663/garage_shop_car_fix.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas</h3>
            <p class="fst-italic">
              Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas.
            </p>
            <p>
              Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas.
              Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas.
              Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas Tekstas tekstas tekstas.

            </p>
          </div>
        </div>

      </div>
    </section>


    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Susisiekti</h2>
        </div>

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Vieta:</h4>
                <p>Smiltelės g. 12, Klaipėda</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>El. paštas:</h4>
                <p>autodalys@info.lt</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefono numeris:</h4>
                <p>+37068866999</p>
              </div>

              <iframe width="100%" height="290px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Smiltel%C4%97s%20g.%2012,%20Klaip%C4%97da+(Autodalys)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">fitness tracker</a></iframe>

            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Jūsų vardas</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Jūsų el. paštas</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Tema</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Žinutė</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Jūsų žinutė išsiųsta. Ačiū!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>

  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>

@endsection