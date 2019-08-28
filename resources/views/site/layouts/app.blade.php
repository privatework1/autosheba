<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Auto Sheba</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('frontend')}}/img/favicon.ico">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,300italic,300&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/zabuto_calendar.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/flexslider.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery.fancybox.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/ion.rangeSlider.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/ion.rangeSlider.skinFlat.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('frontend')}}/css/media.css">

  <!--[if lt IE 9]>
  <script src="{{asset('frontend')}}/js/html5shiv.js"></script>
  <![endif]-->

</head>
<body>

<!-- Header - start -->

<div class="top">
  <ul>
    <a href="">
      <li><i class=" fa fa-phone"></i> 088 01722 55 55 55</li>
    </a> <a href="{{url('/login/vendor-site')}}">
      <li><i class="fa fa-user"></i> Member ship</li>
    </a> <a href="{{url('/b2b-site/login')}}">
      <li><i class="fa fa-building"></i> Corporate Area</li>

      @if(Session::has('customerId'))
    </a> <a href="{{url('customer')}}">
      <li><i class="fa fa-sign-in"></i> Customer Profile</li>
    </a>
        @else
    </a> <a href="{{url('login/customers')}}">
      <li><i class="fa fa-sign-in"></i> Customer Login</li>
    </a>
        @endif

  </ul>
</div>
<div class="header">

  <!-- Navmenu Mobile Toggle Button -->
  <a href="#" class="header-menutoggle" id="header-menutoggle">Menu</a>
  <div class="header-info">

    <!-- Small Cart -->
    <a href="{{url('/cart')}}" class="header-cart">
      <div class="header-cart-inner">
        <p class="header-cart-count"> <img src="{{asset('frontend')}}/img/cart.png" alt=""> <span>{{ $cartCount }}</span> </p>

      </div>
    </a>

    <!-- Search Form -->
    <a href="#" class="header-searchbtn" id="header-searchbtn"></a>
    <form action="{{ url('/searchItems') }}" method="POST" class="header-search" id="header-search">
     {{csrf_field()}}
      <input type="text" name="searchEntity" required placeholder="Search Only Item Name">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

  <!-- Logotype -->
  <p class="header-logo"> <a href="{{url('/')}}"><img src="{{asset('frontend')}}/img/autosheba_logo.png" alt=""></a> </p>

  <!-- Navmenu - start -->
@include('site.inc.top_menu')
  <!-- Navmenu - end -->

</div>
<!-- Header - end -->

<!-- Main Content - start -->





@yield('main_content')

<!-- Main Content - end -->


<!-- Footer - start -->
<footer class="footer">
  <div class="cont footer-top">

    <!-- Footer Menu -->
    <div class="footer-menu">
      <p>Company</p>
      <ul>
        <li><a href="#">Shipping</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">About us</a></li>
      </ul>
    </div>
    <div class="footer-menu">
      <p>Information</p>
      <ul>
        <li><a href="#">Affiliate Program</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Site Map</a></li>
        <li><a href="#">Search Terms</a></li>
      </ul>
    </div>
    <div class="footer-menu">
      <p>Account & Orders</p>
      <ul>
        <li><a href="#">My Account</a></li>
        <li><a href="#">My Garage</a></li>
        <li><a href="#">Shopping Cart</a></li>
        <li><a href="#">Order Status</a></li>
      </ul>
    </div>
    <div class="footer-info">
      <p class="footer-msg">Our online support is available <a class="callback" href="#">Send us a message</a></p>
      <ul class="footer-social">
        <li> <a rel="nofollow" target="_blank" href="http://facebook.com"> <i class="fa fa-facebook"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="mailto:email@email.com"> <i class="fa fa-paper-plane"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="http://pinterest.com"> <i class="fa fa-pinterest-p"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="http://youtube.com"> <i class="fa fa-youtube-play"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="http://twitter.com"> <i class="fa fa-twitter"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="http://google.com"> <i class="fa fa-google-plus"></i> </a> </li>
        <li> <a rel="nofollow" target="_blank" href="http://twitter.com"> <i class="fa fa-share-alt"></i> </a> </li>
      </ul>
      <form action="#" class="form-validate">
        <input data-required="text" data-required-email="email" type="text" placeholder="Email address" name="email1">
        <input type="submit" value="Subscribe">
      </form>
    </div>
  </div>
  <div class="copyright">
    <p class="cont">© 2018 Daakbox IT All Right Received</p>
  </div>
</footer>
<!-- Footer - end -->

<!-- Modal Form -->
<div id="modal-form" class="modal-form">
  <p class="modal-form-ttl">Contact Us</p>
  <form action="#" class="form-validate">
    <input data-required="text" type="text" placeholder="Name" name="name2">
    <input data-required="text" type="text" placeholder="Phone" name="phone2">
    <input data-required="text" data-required-email="email" type="text" placeholder="Email" name="email2">
    <textarea placeholder="Your message" name="mess2"></textarea>
    <input type="submit" value="Send">
  </form>
</div>
<script src="{{asset('frontend')}}/js/jquery-1.12.3.min.js"></script>
<script src="{{asset('frontend')}}/js/fancybox/fancybox.js"></script>
<script src="{{asset('frontend')}}/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<script src="{{asset('frontend')}}/js/jquery.flexslider-min.js"></script>
<script src="{{asset('frontend')}}/js/masonry.pkgd.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.fractionslider.min.js"></script>
<script src="{{asset('frontend')}}/js/ion.rangeSlider.min.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
<script>
  "use strict";
  // Range Slider
  $(document).ready(function () {
    var $range_cost = $("#range_cost");
    $range_cost.ionRangeSlider({
      type: "double",
      grid: true,
      min: 0,
      max: 20000,
      from: 200,
      to: 14000,
      prefix: "$",
    });
    $range_cost.on("change", function () {
      var $this = $(this),
              value = $this.prop("value").split(";");

      $('#range_cost_ttl').html("$" + value[0] + " - $" + value[1]);
    });
    var $range_year = $("#range_year");
    $range_year.ionRangeSlider({
      type: "double",
      grid: true,
      min: 1990,
      max: 2016,
      from: 2013,
      to: 2016,
    });
    $range_year.on("change", function () {
      var $this = $(this),
              value = $this.prop("value").split(";");

      $('#range_year_ttl').html(value[0] + " - " + value[1]);
    });
  });
</script>
</body>
</html>