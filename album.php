<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>JodohnyaSehun</title>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img src="BackEnd/images/ikon1.png" alt="" />
            <span>
              weverse
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">HOME</a>
                <a href="about.html">ABOUT</a>
                <a href="food.html">Album</a>
                <a href="contact.html">Contact Us</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- dish section -->
  <section class="dish_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="dish_container">
            <div class="box">
              <img src="images/pengiriman.png" alt="">
            </div>
            <div class="box">
              <img src="images/pengiriman.png" alt="">
            </div>
            <div class="box">
              <img src="images/pengiriman.png" alt="">
            </div>
            <div class="box">
              <img src="images/pengiriman.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <hr>
              <h2>
                SHIPPING <br>
                INFORMATION
              </h2>
            </div>
            <p>
              We ship worldwide to over 200 countries.
              The perfect condition of customer's orders is our top priority, so we’re inspecting goods before we ship, and we’re working around the clock to make sure that you can get your orders as quickly as possible whilst keeping deliveries safe. You will be notified via email once your order is shipped.
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end dish section -->

  <!-- hot section -->

  <section class="hot_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Weverse Shop Artist
        </h2>
        <hr>
      </div>
      <p>
        WEFERSE sales support Artists so they can provide all of their fans with more music to enjoy! *All album sales from weverse Shop officially count toward Billboard Charts (US orders ONLY), Hanteo, and Circle Charts (Both International + US orders)
      </p>
    </div>
    <div class="carousel_container">
      <div class="container">
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <?php
            include_once("koneksi.php");
            $album = mysqli_query($conn, "SELECT * FROM produk");
            while ($bts = mysqli_fetch_array($album)) {
            ?>
              <div class="item">
                <div class="box">
                  <div class="img-box">
                    <img src="BackEnd/images/<?php echo $bts['Gambar']; ?>" />
                  </div>
                  <div class="detail-box">
                    <h4>
                      <?php echo $bts['NamaProduk']; ?>
                    </h4>
                    <p>
                      <?php echo $bts['Harga']; ?>
                    </p>
                    <a href="https://weverseshop.io/en/home">
                      Order Now
                    </a>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- end hot section -->

  <!-- subscribe section -->

  <section class="subscribe_section">
    <div class="container">
      <form action="">
        <div class="row">
          <div class="col-lg-3 col-md-4">
            <label for="subEmail">
              Our Newsletter
            </label>
          </div>
          <div class="col-lg-9 col-md-8">
            <div class="box">
              <input type="email" placeholder="Enter your email" id="subEmail">
              <button>
                Subscribe
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- end subscribe section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <div class="social_container">
      <h4>
        Follow on
      </h4>
      <div class="social-box">
        <a href="">
          <img src="images/fb.png" alt="">
        </a>
        <a href="">
          <img src="images/twitter.png" alt="">
        </a>
        <a href="">
          <img src="images/linkedin.png" alt="">
        </a>
        <a href="">
          <img src="images/youtube.png" alt="">
        </a>
      </div>
    </div>
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>

  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 35,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>