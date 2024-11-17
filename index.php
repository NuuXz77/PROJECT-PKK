<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Safsar Web</title>
  <link rel="stylesheet" href="style/styles.css" />
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link
    rel="stylesheet"
    type="text/css"
    href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
  <main>
    <section>
      <div class="nav">
        <div class="logo"><a href="#">logo</a></div>
        <div class="menu-nav">
          <a href="#home">Home</a>
          <a href="#menu">Menu</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
          <a class="sign" href="login_form.php">Sign In / Sign Up</a>
        </div>
      </div>
      <div class="landing-page" id="home">
        <div class="kiri">
          <h1>Selamat Datang Di Website <i>Safsar~</i></h1>
          <p>
            di sini kami menyediakan produk makanan dan juga minuman harga
            produk terjangkau mulai dari harga 3rb - 5rb
          </p>
          <button>Order Yuk!</button>
        </div>
        <div class="kanan">
          <!-- <h1>hello</h1> -->
        </div>
      </div>
    </section>
    <section>
      <div class="daftar-menu sisi" id="menu">
        <div class="menu">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwpeJaeMm_m1F61hGBjB0qXrBm-9JDi5_4-Q&s"
            alt=""
            width=" " />
          <h1>menu 1</h1>
          <p>
            Pisang coklat 5000 dijual hanet ngenah di dahar jeng disanguan
          </p>
          <button class="btn-order">Pesan</button>
        </div>
        <div class="menu">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwpeJaeMm_m1F61hGBjB0qXrBm-9JDi5_4-Q&s"
            alt=""
            width=" " />
          <h1>menu 2</h1>
          <p>
            Pisang coklat 5000 dijual hanet ngenah di dahar jeng disanguan
          </p>
          <button class="btn-order">Pesan</button>
        </div>
        <div class="menu">
          <img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwpeJaeMm_m1F61hGBjB0qXrBm-9JDi5_4-Q&s"
            alt=""
            width=" " />
          <h1>menu 3</h1>
          <p>
            Pisang coklat 5000 dijual hanet ngenah di dahar jeng disanguan
          </p>
          <button class="btn-order">Pesan</button>
        </div>
      </div>
    </section>
    <section>
      <div id="creator" class="creator sisi">
        <div class="judul" data-aos="fade-down">
          <h1>Creator</h1>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <!-- Slides for each creator -->
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">

                <div class="creator-name">Wisnu</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Azmi</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Ikmal</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Vikri</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="contact-we sisi" id="contact">
        <div class="kotak-contak">
          <i class="fas fa-phone"></i>
          <h3>Hubungi Kami</h3>
          <p>Kami memiliki anggota untuk membantu anda</p>
          <button>Hubungi Kami</button>
        </div>
        <div class="kotak-contak">
          <i class="fas fa-envelope"></i>
          <h3>Email Us</h3>
          <p>Cukup kirimkan email kepada kami di <b>safsar@gmail.com</b></p>
          <button>Kirim Email</button>
        </div>
      </div>
    </section>
    <footer>
      <h1>2023-<?php echo date("Y") ?> &copy; Safsar Tim</h1>
    </footer>
  </main>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  <script
    type="text/javascript"
    src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
          behavior: "smooth",
        });
      });
    });

    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 3,
      spaceBetween: 30,
      centeredSlides: true,
      loop: false, // Disable looping
      autoplay: {
        delay: 2500, // Time between automatic slide transitions
        disableOnInteraction: false, // Autoplay continues after user interaction
      },
      speed: 1000, // Speed of transition
      grabCursor: true, // Enable cursor grab
      slideToClickedSlide: true, // Allow user to click and jump to a slide
      breakpoints: {
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        480: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
      },
      on: {
        reachEnd: function() {
          setTimeout(() => {
            swiper.slideTo(0, 1000); // Move to the first slide smoothly after a delay
          }, 2500); // Delay equal to autoplay delay
        },
      },
    });
  </script>
</body>

</html>