<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="<?= Web::assets('brand/favicon.png', 'images'); ?>" type="image/x-icon">
  <title><?= $title != '' ? $title . ' | ' . getenv('APP_NAME') : getenv('APP_NAME') ?></title>
  <meta content="<?= $desc; ?>" name="description" />
  <base href="<?= Web::url() ?>" />
  <link rel="stylesheet" href="<?= Web::assets('css/bootstrap.css', 'frontend') ?>">
  <link rel="stylesheet" href="<?= Web::assets('css/font-awesome.css', 'frontend') ?>">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Work+Sans:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= Web::assets('all.min.css', 'css') ?>">
  <link rel="stylesheet" href="<?= Web::assets('css/museo.css', 'frontend') ?>">
  <link rel="stylesheet" href="<?= Web::assets('css/style.css', 'frontend') ?>">
  <link rel="stylesheet" href="<?= Web::assets('css/media-screen.css', 'frontend') ?>">
  <script src="<?= Web::assets('js/jquery.min.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/bootstrap.min.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/jquery.easing.min.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/particles.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/stellar.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/typeit.js', 'frontend') ?>"></script>
  <script src="<?= Web::assets('js/parallax.js', 'frontend') ?>"></script>
  <style>
    .soon {
      background-color: #333;
      height: 100vh;
      display: flex;
      align-items: center;
    }

    .soon .title,
    .soon .title .sub-title p {
      color: #fff;
    }

    .icon {
      width: 5rem;
      height: 5rem;
    }

    .icon-shape {
      display: inline-flex;
      padding: 12px;
      text-align: center;
      border-radius: 50%;
      align-items: center;
      justify-content: center;
    }

    .icon i,
    .icon svg {
      font-size: 3.25rem;
    }

    .icon-shape i,
    .icon-shape svg {
      font-size: 2.25rem;
    }

    .avatar.rounded-circle img,
    .rounded-circle {
      border-radius: 50% !important;
    }

    .bg-gradient-primary {
      background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
    }

    .bg-gradient-secondary {
      background: linear-gradient(87deg, #f7fafc 0, #f7f8fc 100%) !important;
    }

    .bg-gradient-success {
      background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;
    }

    .bg-gradient-info {
      background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important;
    }

    .bg-gradient-warning {
      background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;
    }

    .bg-gradient-danger {
      background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
    }

    .bg-gradient-light {
      background: linear-gradient(87deg, #adb5bd 0, #adaebd 100%) !important;
    }

    .bg-gradient-dark {
      background: linear-gradient(87deg, #212529 0, #212229 100%) !important;
    }

    .bg-gradient-default {
      background: linear-gradient(87deg, #172b4d 0, #1a174d 100%) !important;
    }

    .bg-gradient-white {
      background: linear-gradient(87deg, #fff 0, #fff 100%) !important;
    }

    .bg-gradient-neutral {
      background: linear-gradient(87deg, #fff 0, #fff 100%) !important;
    }

    .bg-gradient-darker {
      background: linear-gradient(87deg, #000 0, #000 100%) !important;
    }

    .bg-gradient-blue {
      background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
    }

    .bg-gradient-indigo {
      background: linear-gradient(87deg, #5603ad 0, #9d03ad 100%) !important;
    }

    .bg-gradient-purple {
      background: linear-gradient(87deg, #8965e0 0, #bc65e0 100%) !important;
    }

    .bg-gradient-pink {
      background: linear-gradient(87deg, #f3a4b5 0, #f3b4a4 100%) !important;
    }

    .bg-gradient-red {
      background: linear-gradient(87deg, #f5365c 0, #f56036 100%) !important;
    }

    .bg-gradient-orange {
      background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;
    }

    .bg-gradient-yellow {
      background: linear-gradient(87deg, #ffd600 0, #beff00 100%) !important;
    }

    .bg-gradient-green {
      background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;
    }

    .bg-gradient-teal {
      background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important;
    }

    .bg-gradient-cyan {
      background: linear-gradient(87deg, #2bffc6 0, #2be0ff 100%) !important;
    }

    .bg-gradient-white {
      background: linear-gradient(87deg, #fff 0, #fff 100%) !important;
    }

    .bg-gradient-gray {
      background: linear-gradient(87deg, #8898aa 0, #888aaa 100%) !important;
    }

    .bg-gradient-gray-dark {
      background: linear-gradient(87deg, #32325d 0, #44325d 100%) !important;
    }

    .bg-gradient-light {
      background: linear-gradient(87deg, #ced4da 0, #cecfda 100%) !important;
    }

    .bg-gradient-lighter {
      background: linear-gradient(87deg, #e9ecef 0, #e9eaef 100%) !important;
    }

    .navbar-default .default-logo,
    .navbar-default.affix .affix-logo {
      display: block;
    }

    .navbar-default.affix .default-logo,
    .navbar-default .affix-logo {
      display: none;
    }

    a:hover,
    a:focus {
      text-decoration: none;
    }

    .form-search {
      font-size: 3rem;
      height: auto;
      border-radius: 0;
      padding-left: 0;
      padding-right: 0;
      border-top: 0;
      border-left: 0;
      border-right: 0;
      box-shadow: none;
      text-align: center;
      font-weight: bold;
      border-width: 2px;
      border-color: #e9ecef;
    }

    .form-search:focus {
      box-shadow: none;
    }
  </style>
</head>

<body>
  <!-- Preloader -->
  <!-- <div class="preloader">
    <div class="waves">
      <div class="circle-1"></div>
      <div class="circle-2"></div>
      <div class="circle" style="border-radius: 50%;">
      </div>
    </div>
  </div> -->
  <!-- Preloader end-->

  <div class="overlay-navigation-open"></div>
  <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" collapsed="true" id="collapse">
          <span class="menuDiv">
            <span class="menu-line"></span>
          </span>
        </button>
        <a class="navbar-brand" href="<?= Web::url() ?>#">
          <img class="default-logo" src="<?= Web::assets('brand/kuansing.png', 'images') ?>" alt="kuansing">
          <img class="affix-logo" src="<?= Web::assets('brand/kuansing-blue.png', 'images') ?>" alt="kuansing">
        </a>
      </div>
      <div class="navigation">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="decoration" href="<?= Web::url() ?>#">Beranda</a></li>
          <li><a class="decoration" href="<?= Web::url() ?>#tentang-covid19">Tentang COVID-19</a></li>
          <li><a class="decoration" href="<?= Web::url() ?>#data-kasus">Kasus COVID-19</a></li>
          <li><a class="decoration" href="<?= Web::url() ?>#kontak">Kontak</a></li>
          <li><a class="decoration" href="<?= Web::url() ?>#pencegahan">Pencegahan</a></li>
          <li><a class="decoration" href="<?= Web::url() ?>#rumah-sakit">Rumah Sakit</a></li>
          <!-- <li><a href="http://www.instagram.com/komafx" class="menu-special"><i class="fa fa-instagram"></i> Follow my Instagram</a></li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Content -->
  <?php require_once $content; ?>
  <!-- End Content -->
  <div class="bg-dark-blue">
    <div class="container">
      <div class="py-5">
        <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6622007913684!2d101.5389565143219!3d-0.5068636354144271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2a4fd1e1d55d11%3A0x32e4658a1455b4ce!2sDiskominfoss+Kab.+Kuantan+Singingi!5e0!3m2!1sid!2sid!4v1552381039548" width="100%" height="250" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="d-flex flex-column flex-md-row mx--3 mx-md-0 align-items-center py-5 border-top border-dark-blue">
        <div class="mx-3 ml-md-0 flex-col">
          <h6 class="text-light font-weight-normal text-center text-md-left mb-3 mb-md-0">&copy; 2020 <span class="font-weight-medium"><?= getenv('APP_NAME') ?></span></h6>
        </div>
        <div class="mx-3 mr-md-0 flex-col">
          <h6 class="text-light font-weight-normal text-center text-md-right mb-0">Powered by <span class="text-warning font-weight-medium">Diskominfoss Kuansing</span></h6>
        </div>
      </div>
    </div>
  </div>
  <script>
    $('.type-it').each(function() {
      this.style.height = this.offsetHeight + 'px'
      new TypeIt(this, {
        strings: [this.text],
        speed: 50,
        breakLines: true,
        autoStart: false
      })
    })
  </script>

  <script>
    var s = $('.banner-bg')
    s.parallax()
  </script>

  <script>
    // setInterval(function() {
    //   var oVal = ($(window).scrollTop() / 3),
    //     w = $(window).width()
    //   $('.banner-bg').css({
    //     'transform': 'translate3d(0,-' + oVal + 'px,0)',
    //     '-webkit-transform': 'translate3d(0,-' + oVal + 'px,0)',
    //     '-ms-transform': 'translate3d(0,-' + oVal + 'px,0)',
    //     '-o-transform': 'translate3d(0,-' + oVal + 'px,0)'
    //   })
    // }, 0)
  </script>

  <script>
    const scrollTo = (anchor, topOffset, callback = null) => {
      $('html, body').stop().animate({
        scrollTop: (anchor ? $(anchor).offset().top - (topOffset - 1) : 0)
      }, 800, 'easeInOutExpo', () => {
        callback !== null ? callback() : null
      })
    }


    $('.navbar').each(function() {
      let $this = $(this)
      let navbarToggle = $this.find('.navbar-toggle')
      let overlayNavigationOpen = $this.prev('.overlay-navigation-open')
      navbarToggle.on('click', function() {
        let $this = $(this)
        let collapsed = $this.attr('collapsed')
        let navbar = $this.parents('.navbar')
        let navigation = navbar.find('.navigation')
        let overlayNavigationOpen = navbar.prev('.overlay-navigation-open')
        if (collapsed == 'true') {
          navigation.addClass('navme-collapse')
          overlayNavigationOpen.fadeIn(250)
          navbar.addClass('navbarme-collapse')
          $this.removeClass('collapsed')
          $this.attr('collapsed', 'false')
        } else if (collapsed == 'false') {
          navigation.removeClass('navme-collapse')
          overlayNavigationOpen.fadeOut(250)
          navbar.removeClass('navbarme-collapse')
          $this.addClass('collapsed')
          $this.attr('collapsed', 'true')
        }
      })
      overlayNavigationOpen.on('click', function() {
        let $this = $(this)
        let navbar = $this.next('.navbar')
        let navbarToggle = navbar.find('.navbar-toggle')
        navbarToggle.click()
      })
    })

    $(window).on('load', function() {
      /* Collapse by ME */

      /* Scrollspy, Affix & jQuery Easing */

      // offset
      var n = $('#navbar').height()

      // Scrollspy

      $('body').scrollspy({
        target: '.navbar',
        offset: n
      })

      // Affix

      $('.navbar').affix({
        offset: {
          top: n
        }
      })

      console.log(window.location.href)
      $('.nav li a, .banner .to-content').bind('click', function(event) {
        // event.preventDefault()
        if (!$(this).parent().hasClass('dropdown')) {
          $('.nav li.active').removeClass('active')
          var $anchor = this.hash
          scrollTo($anchor, n, () => $(this).parent().addClass('active'))
        }
      })

      $('a.navbar-brand').bind('click', function(event) {
        // event.preventDefault()
        var $anchor = this.hash
        scrollTo($anchor, n)
      })

      if (window.location.hash !== '') {
        setTimeout(function() {
          let hash = window.location.hash
          $(hash) ? scrollTo(window.location.hash, n) : null
        }, 250)
      } else {
        scrollTo('#depan', n)
      }

    })
  </script>

  <a class="back-to-top" href="#"></a>

  <script>
    $(document).ready(function() {

      var offset = 800,
        duration = 800

      $(window).scroll(function() {

        if ($(this).scrollTop() > offset) {
          $('.back-to-top').fadeIn(duration)
        } else {
          $('.back-to-top').fadeOut(duration)
        }

      })



      $('.back-to-top').click(function(event) {

        event.preventDefault()

        $('html, body').animate({
          scrollTop: 0
        }, duration)

        return false

      })

    })
  </script>

  <script>
    $(function() {
      $.stellar({
        horizontalScrolling: false,
        verticalOffset: 20
      })
    })
  </script>

  <script>
    setTimeout(function() {
      particlesJS.load('particles_js', '<?= Web::assets('assets/json/particlesjs-config.json', 'frontend') ?>',
        function() {
          // console.log('callback - particles.js config loaded')
        })
    }, 100)
  </script>

  <script>
    // preloader
    $(window).on('load', function() {
      var $preloader = $('.preloader')
      $preloader.delay(500).fadeOut('slow')
    })
  </script>
</body>

</html>