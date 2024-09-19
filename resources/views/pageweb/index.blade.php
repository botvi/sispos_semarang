
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Chain App Dev - App Landing Page HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('web') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/animated.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/owl.css">

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo d-flex align-items-center" style="text-decoration: none;">
                <img src="{{ asset('env') }}/logoforum.png" alt="Logo" style="height: 40px; width: 40px;"/>
                <span style="margin-left: 10px; font-size: 24px; font-weight: bold;">Siprosemar</span>
              </a>
              
              
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><div class="gradient-button"><a href="/login"><i class="fa fa-sign-in-alt"></i> Masuk</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Apa itu SIPROSEMAR ?</h2>
                    <p>Sistem Informasi Profil Posyandu dikembangkan dalam rangka memfasilitasi pemantauan dan evaluasi kegiatan layanan posyandu sehingga dapat menjadi dasar dalam penyusunan kebijakan kesehatan yang lebih efektif, sesuai dengan kebutuhan masyarakat.</p>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                      <a href="/registrasi"><i class="fas fa-user-nurse"></i> Daftarkan Posyandu </a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{ asset('web') }}/assets/images/1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>SIPROSEMAR</h4>
            <img src="{{ asset('web') }}/assets/images/heading-line-dec.png" alt="">
            <p>Sistem Informasi Profil Posyandu</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Jumlah Puskesmas</h4>           
            <h4>{{ $totalPuskesmas }}</h4>           
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Jumlah Posyandu</h4>
            <h4>{{ $totalPosyandu }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Scripts -->
  <script src="{{ asset('web') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('web') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('web') }}/assets/js/owl-carousel.js"></script>
  <script src="{{ asset('web') }}/assets/js/animation.js"></script>
  <script src="{{ asset('web') }}/assets/js/imagesloaded.js"></script>
  <script src="{{ asset('web') }}/assets/js/popup.js"></script>
  <script src="{{ asset('web') }}/assets/js/custom.js"></script>
</body>
</html>