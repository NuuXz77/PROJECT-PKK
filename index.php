<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Safsar Web</title>
  <!-- <link rel="stylesheet" href="style/styles.css"/> -->
<<<<<<< HEAD
  <link rel="stylesheet" href="style/utama.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
=======
  <!-- <link rel="stylesheet" href="style/utama.css"> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
>>>>>>> 68d6b83 (DONE)
  <link
    rel="stylesheet"
    type="text/css"
    href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<<<<<<< HEAD
=======

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <?php
    include 'modular/icon.php';
  ?>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      font-family: "Poppins", sans-serif;
      margin: 0;
      padding: 0;
      font-size: 16px;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      width: 100%;
    }

    /* Root disini untuk 16 px menjadi 10px dan warna yang dimasukan variabel*/
    :root {
      font-size: 10px;
      --primary-color: #ffe31a;
      --hover-color: #d4bc00;
    }

    /* akhir bagian vikri */
    .sisi {
      /* margin-top: 4rem;R */
      margin-left: 6rem;
      margin-right: 6rem;
    }

    /* Navbar */
    .nav {
      display: flex;

      justify-content: space-between;
      height: 7rem;
      align-items: center;
      backdrop-filter: blur(3px);
      position: fixed;
      width: 100%;
      z-index: 9999999;
    }

    .nav.scrolled {
      background: #fff;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.05);
    }

    .logo img {
      width: 40px;
      margin-left: 6rem;
    }

    /* Menu Links */
    .menu-nav {
      margin-right: 6rem;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav .menu-nav a {
      margin: 1rem;
      font-size: 1.3rem;
      text-decoration: none;
      color: #000;
    }

    .nav .menu-nav .sign {
      padding: 0.9rem;
      border-radius: 1rem;
      background-color: #fff;
      border: 2px solid #fff;
      transition: all 0.3s ease-in-out;
    }

    .nav .menu-nav .sign:hover {
      border: 2px solid #000;
      background-color: transparent;
    }

    /* Burger Icon */
    .burger {
      display: none;
      font-size: 2rem;
      cursor: pointer;
      color: #000;
    }



    /* tah ie all landing page */
    .landing-page {
      position: relative;
      width: auto;
      padding-left: 6rem;
      padding-right: 6rem;
      padding-top: 7rem;
      height: auto;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
      background-image: url("../img/Cover.svg");
      background-size: cover;
    }

    .landing-page .kiri {
      /* background-color: red; */
      width: 50%;
      height: auto;
      align-items: center;
      margin: 0 auto;
      text-align: left;
      /* background-color: #d4bc00; */
    }

    .landing-page .kiri img {
      width: 100px;
    }

    .landing-page .kiri h1,
    i {
      width: auto;
      margin: auto;
      font-size: 3.5rem;
      font-weight: 400;
    }

    .landing-page .kiri p {
      margin-top: 3rem;
    }

    .landing-page .kiri button {
      padding: 0.8rem;
      margin-top: 1rem;
      background-color: transparent;
      border: 2px solid var(--primary-color);
      border-radius: 1rem;
      transition: all 0.3s ease-in-out;
    }

    .landing-page .kiri button:hover {
      border: 2px solid var(--primary-color);
      background-color: var(--primary-color);
    }

    /* didie lannding page nya anj */
    .landing-page .kanan {
      /* background-image: url('img/landing.svg'); */
      /* background-size: cover; */
      height: 80vh;
      width: 50%;
      align-items: center;
      display: flex;
      justify-content: center;
      /* background-color: #d4bc00; */
    }

    .produk .judul {
      /* background-color: #d4bc00; */
      padding-top: 11rem;
      margin-top: 5rem;
    }

    .produk .judul h2 {
      font-size: 2rem;
    }

    /* Wisnu membuat card */
    .daftar-menu {
      /* border: 1px solid blue; */
      width: auto;
      position: relative;
      height: auto;
      /* background-color: aqua; */
      display: flex;
      justify-content: center;
      align-items: center;
      /* margin: 199; */
      /* column-gap: 4; */
      /* background-color: #fff; */
      flex-wrap: wrap;
      /* z-index: 92929292; */
    }

    .daftar-menu .menu {
      border-top-left-radius: 2rem;
      border-bottom-right-radius: 2rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.06);
      margin: 5rem 2rem;
      padding: 4rem;
      background-color: #fff;
      justify-content: center;
      align-items: center;
      width: auto;
      height: auto;
      gap: 1;
      transition: all 0.2s ease-in-out;
      /* display: flex; */
    }

    .daftar-menu .menu:hover {
      transform: scale(1) translateY(-10px);
    }

    .daftar-menu .menu img {
      /* width: 120000px; */
      display: flex;
      border-radius: 0.5rem;
      border: 0.1rem solid var(--primary-color);
      width: auto;
      padding: auto;
      margin: auto;
      justify-content: center;
    }

    .daftar-menu .menu p {
      width: 24rem;
    }

    .daftar-menu .menu button {
      justify-content: center;
      background-color: var(--primary-color);
      border: none;
      padding: 0.7rem;
      margin-top: 0.5rem;
      width: 100rem;
      max-width: 24rem;
      border-radius: 1rem;
      transition: all 0.2s ease-in-out;
      /* text-align: center*/
    }

    /* Style buat border tambahin aja yang lain yaa hover nih bisa disni */
    .daftar-menu .menu button:hover {
      background-color: var(--hover-color);
    }

    /* ini about ya dek */
    #about {
      /* background-color: #333; */
      margin-top: 5rem;
      padding-top: 10rem;
    }

    .judul {
      text-align: center;
      margin-bottom: 4rem;
    }

    .judul h3 {
      font-size: 2rem;
      color: var(--primary-color);
    }

    .judul h1 {
      font-size: 3rem;
    }

    .judul p {
      width: 70%;
      margin: auto;
    }

    .weare {
      /* border: 1px solid blue; */
      /* padding-top: 100rem; */
      justify-content: center;
      align-items: center;
      width: auto;
      display: flex;
      position: relative;
      height: auto;
      margin-bottom: 10rem;
    }

    .weare .isi {
      /* background-color: aqua; */
      width: 40%;
      margin: auto;
      list-style: none;
    }

    .weare .isi h1 {
      font-size: 2.5rem;
      font-weight: 350;
      margin-bottom: 4rem;
    }

    .weare .isi i {
      color: var(--primary-color);
      margin-right: 1rem;
    }

    .weare .isi i,
    ul li {
      list-style: none;
      align-items: center;
      display: inline-flex;
      font-size: 1.9rem;
      margin-left: 2rem;
      /* padding: 1rem; */
    }

    .weare .isi {
      /* background-color: #333; */
      width: 60%;
      justify-content: center;
      margin: auto;
      align-items: center;
    }

    .weare .isi img {
      margin: auto;
      justify-content: center;
      align-items: center;
      display: flex;
    }

    .map .lok iframe {
      border-radius: 2rem;
      height: 70vh;
    }

    /* Slider Styles */
    #creator {
      width: auto;
      height: 100vh;
      margin-top: 18rem;
    }

    #creator .judul h1 {
      font-size: 3rem;
      text-align: center;
      margin-bottom: 2rem;
    }

    #creator .by {
      display: flex;
      /* flex-wrap: wrap; */
      text-align: center;
      overflow-x: scroll;
      gap: 20px;
      width: 100%;
      scroll-snap-type: x mandatory;
    }

    .swiper-container {
      width: 100%;
      /* max-width: 200px; */
      padding: 20px 0;
      overflow: hidden;
      /* Ensure no overflow */
    }

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
      transition: transform 0.3s ease;
      /* Smooth transition for scaling */
      position: relative;
      /* Position for shadow effect */
    }

    .swiper-slide img {
      width: 100%;
      align-items: center;
      display: flex;
      justify-content: center;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      /* Smooth effect */
    }

    .swiper-slide-active img {
      transform: scale(1.1);
      /* Scale the active slide */
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
      /* Enhance shadow for active slide */
    }

    .swiper-slide:not(.swiper-slide-active) img {
      /* opacity: 0.4; */
      filter: blur(4px);
      transition: all 0.2s ease-in-out;
      /* Slightly dim inactive slides */
    }

    /* Ensure the container holds both the image and name */
    .creator-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: auto;
    }

    .creator-card img {
      width: 100%;
      max-width: 200px;
      /* Adjust size based on design */
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    /* Styles for creator names below images */
    .creator-name {
      margin-top: 30px;
      font-size: 2rem;
      font-weight: bold;
      color: #333;
      /* You can adjust the color as needed */
      text-align: center;
    }

    /* contack kam ya dong anjuy */
    .contact-we {
      margin-top: 7rem;
      width: auto;
      /* background-color: #d4bc00; */
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .contact-we .kotak-contak {
      width: 40%;
      /* text-align: start; */
      border-radius: 2rem;
      margin: 2rem;
      height: 46vh;
      padding: 2rem;
      background-color: rgba(0, 0, 0, 0.1);
      gap: 3;
      transition: all 0.2s ease-in-out;
    }

    .contact-we .kotak-contak:hover {
      box-shadow: 1px 2px 10px 0px rgba(0, 0, 0, 0.1);
      transform: scale(1) translateY(-10px);
      background-color: #fff;
    }

    .contact-we i {
      border: 4px solid var(--primary-color);
      padding: 1rem;
      border-radius: 50%;
      margin: 2rem;
    }


    .contact-we button {
      padding: 1rem;
      border-radius: 2rem;
      text-decoration: none;
      color: #000;
      margin: 1rem;
      border: 2px solid var(--primary-color);
      background-color: transparent;
      transition: all 0.2s ease-in-out;
    }


    .contact-we button:hover {
      text-decoration: none;
      background-color: var(--primary-color);
    }

    .contact-we a {
      text-decoration: none;
      color: #000;
      transition: all 0.2s ease-in;
    }

    .contact-we a:hover {
      text-decoration: underline;
      color: var(--primary-color);
    }

    /* ini footer yaa deee */
    footer {
      width: auto;
      /* height: vh; */
      padding: 0.9rem;
      text-align: center;
      /* background-color: #d4bc00; */
      box-shadow: 0px -1px 20px 0px rgba(0, 0, 0, 0.1);
    }

    footer h1 {
      font-weight: 300;
    }

    /* untuk bagian hamburger menu */
    .nav .bx {
      visibility: hidden;
    }

    .active {
      width: 50%;
      height: 50%;
      background-color: black;
    }

    /* Responsive Menu */
    @media (max-width: 768px) {
      .menu-nav {
        display: none;
        flex-direction: column;
        gap: 1rem;
        position: absolute;
        top: 100%;
        right: 0;
        background: #fff;
        width: 100%;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      }

      .menu-nav.active {
        display: flex;
        width: 50%;
        border-radius: 2rem;
        /* background-color: transparent; */
        backdrop-filter: blur(10px);
        margin: auto;
        height: auto;
      }

      .menu-nav.active a {
        width: 90%;
        color: #333;
        text-align: center;
      }

      .burger {
        display: block;
        margin-right: 6rem;
      }

      .landing-page {
        flex-direction: column;
      }

      .landing-page .kanan {
        display: none;
      }

      .landing-page .kiri {
        text-align: center;
        width: 100%;
        font-size: 1rem;
      }

      .produk .judul p {
        width: 100%;
      }

      #about .judul p {
        width: 100%;
        /* color: #f9f9; */
      }

      .weare {
        flex-direction: column;
        margin-bottom: 8rem;
      }

      .weare .isi {
        width: 100%;
      }

      .weare .isi img {
        width: 400px;
      }

      .swiper-slide img {
        width: 50%;
        align-items: center;
        display: flex;
        justify-content: center;
        margin: auto;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Smooth effect */
      }

      .contact-we {
        flex-direction: column;
        margin-top: 15rem;
      }

      .contact-we .kotak-contak {
        width: 100%;
        border-radius: 2rem;
        height: auto;
        padding: 2rem;
        background-color: rgba(0, 0, 0, 0.1);
        gap: 2;
        transition: all 0.2s ease-in-out;
      }
    }
  </style>
>>>>>>> 68d6b83 (DONE)
</head>

<body>
  <main>
    <section>
<<<<<<< HEAD
      <div class="nav">
        <div class="logo"><a href="#"><img src="img/I.svg" alt="" width="40px"></a></div>
        <div class="menu-nav">
=======
      <div data-aos="fade-down" data-aos-duration="1000" class="nav">
        <div class="logo">
          <a href="#"><img src="img/I.svg" alt="Logo" width="40px"></a>
        </div>
        <!-- Burger Button -->
        <div class="burger" id="burger">
          <i class="fa-solid fa-bars"></i>
        </div>
        <div class="menu-nav" id="menu-nav">
>>>>>>> 68d6b83 (DONE)
          <a href="#home">Home</a>
          <a href="#menu">Menu</a>
          <a href="#about">About</a>
          <a href="#contact">Contact</a>
          <a class="sign" href="login_form.php">Sign In / Sign Up</a>
        </div>
      </div>
<<<<<<< HEAD
      <div class="landing-page" id="home">
        <div class="kiri">
=======

      <div class="landing-page" id="home">
        <div data-aos="fade-right" data-aos-duration="1000" class="kiri">
>>>>>>> 68d6b83 (DONE)
          <h1>Selamat Datang Di Website <i>Safsar~</i></h1>
          <p>
            di sini kami menyediakan produk makanan dan juga minuman harga
            produk terjangkau mulai dari harga 3rb - 5rb
          </p>
          <button>Order Yuk!</button>
        </div>
<<<<<<< HEAD
        <div class="kanan">
          <!-- <h1>hello</h1> -->
        </div>
      </div>
    </section>
    <section>
      <div class="produk">
        <div class="judul sisi">
          <h2>Menu / Produk</h2>
          <a href="">
            <h2>Order Menu</h2>
          </a>
        </div>
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
=======
        <div data-aos="fade-left" data-aos-duration="1000" class="kanan">
          <img src="img/landing.svg" width="400px" alt="">
        </div>
      </div>
    </section>

    <section>
      <div class="produk" id="menu">
        <div data-aos="fade-down" data-aos-duration="1500" class="judul sisi">
          <h3>PRODUK</h3>
          <h1>Produk Terbaik & Nikmat</h1>
          <p>Kami membuat produk yang berkualitas dan juga memiliki kenikmatan yang mantap.Dengan harga murah dan juga terjangkau oleh anak-anak sampai orang dewasa</p>
        </div>
      </div>
      <div class="daftar-menu sisi">
        <div data-aos="flip-left" data-aos-duration="900" class="menu">
          <img
            src="img/I.svg"
            alt=""
            width=" " />
          <h1>menu 1</h1>
          <p>
            Produk yang murah dan enak, beli satu gratis 1
          </p>
          <button class="btn-order">Pesan</button>
        </div>
        <div data-aos="flip-left" data-aos-duration="900" class="menu">
          <img
            src="img/I.svg"
            alt=""
            width=" " />
          <h1>menu 2</h1>
          <p>
            Produk yang murah dan enak, beli satu gratis 1
          </p>
          <button class="btn-order">Pesan</button>
        </div>
        <div data-aos="flip-left" data-aos-duration="900" class="menu">
          <img
            src="img/I.svg"
            alt=""
            width=" " />
          <h1>menu 3</h1>
          <p>
            Produk yang murah dan enak, beli satu gratis 1
          </p>
          <button class="btn-order">Pesan</button>
>>>>>>> 68d6b83 (DONE)
        </div>
      </div>
    </section>
    <section>
      <div id="about">
<<<<<<< HEAD
        <div class="weare sisi">
          <div class="isi">
          <h1>Kami siap menyediakan makanan dan
            minuman enak dan harga murah</h1>
          <ul>
            <li><i class='bx bx-check-circle'></i>selalu di buat dengan bahan fresh</li>
            <li><i class='bx bx-check-circle'></i>Harga di jamin murah</li>
            <li><i class='bx bx-check-circle'></i>Join member untuk dapat ke untungan</li>
          </ul>
        </div>
          <div class="isi">
            <img src="img/ikmal.svg" width="525px">
=======
        <div class="judul sisi">
          <h3>TENTANG</h3>
          <h1>Keramah Tamahan Yang Kami Miliki</h1>
          <p>Kami akan selalu melayani dengan sopan dan ramah ,dan kami akan selalu memberi yang terbaik kepada pembeli, pembeli akan terasa nyaman oleh kami.</p>
        </div>
        <div class="weare sisi">
          <div class="isi">
            <h1>Kami siap menyediakan makanan dan
              minuman enak dan harga murah</h1>
            <ul>
              <li><i class='bx bx-check-circle'></i>selalu di buat dengan bahan fresh</li>
              <li><i class='bx bx-check-circle'></i>Harga di jamin murah</li>
              <li><i class='bx bx-check-circle'></i>Join member untuk dapat ke untungan</li>
            </ul>
          </div>
          <div class="isi">
            <img src="img/masak.svg" width="525px">
>>>>>>> 68d6b83 (DONE)
          </div>
        </div>
        <div class="weare sisi">
          <div class="isi">
            <img src="img/yazdi.svg" width="525px">
          </div>
          <div class="isi">
<<<<<<< HEAD
            <h1>Kami siap melayani anda dengan sepenuh hati 
              dan juga senang hati
            </h1>
          <ul>
            <li><i class='bx bx-check-circle'></i>Melayani dengan baik</li>
            <li><i class='bx bx-check-circle'></i>Senyum kami akan menembus pembeli</li>
            <li><i class='bx bx-check-circle'></i>Sopan dan ramah</li>
          </ul>
        </div>
      </div>
      <div class="weare sisi">
        <div class="isi">
        <h1>Kami siap menyediakan makanan dan
          minuman enak dan harga murah</h1>
        <ul>
          <li><i class='bx bx-check-circle'></i>selalu di buat dengan bahan fresh</li>
          <li><i class='bx bx-check-circle'></i>Harga di jamin murah</li>
          <li><i class='bx bx-check-circle'></i>Join member untuk dapat ke untungan</li>
        </ul>
      </div>
        <div class="isi">
          <img src="img/ikmal.svg" width="525px">
=======
            <h1>Kami siap melayani anda dengan sepenuh hati
              dan juga senang hati
            </h1>
            <ul>
              <li><i class='bx bx-check-circle'></i>Melayani dengan baik</li>
              <li><i class='bx bx-check-circle'></i>Senyum kami akan menembus pembeli</li>
              <li><i class='bx bx-check-circle'></i>Sopan dan ramah</li>
            </ul>
          </div>
        </div>
        <div class="weare sisi">
          <div class="isi">
            <h1>Produksi dengan serius dan menghasilkan produk yang elegan dan mantap.</h1>
            <ul>
              <li><i class='bx bx-check-circle'></i>selalu di buat dengan bahan fresh</li>
              <li><i class='bx bx-check-circle'></i>Harga di jamin murah</li>
              <li><i class='bx bx-check-circle'></i>Join member untuk dapat ke untungan</li>
            </ul>
          </div>
          <div class="isi">
            <img src="img/ikmal.svg" width="525px">
          </div>
        </div>
        <div class="map sisi">
          <div class="judul sisi">
            <h3>PETA</h3>
            <h1>Peta Lokasi Kami</h1>
            <p>Anda bisa menemui kami di peta lokasi yang sudah tersedia pada map, bisa di gunakan untuk pembayaran cash order delivery</p>
          </div>
          <div class="lok">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2063.4470982476096!2d108.32693473515084!3d-7.32315295403474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f5eba1b06f52f%3A0xaf882382d9de1508!2sSMK%20Negeri%201%20Ciamis!5e1!3m2!1sid!2sid!4v1733962064662!5m2!1sid!2sid" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
>>>>>>> 68d6b83 (DONE)
        </div>
      </div>
      </div>
    </section>
<<<<<<< HEAD
    
    <section>
      <div id="creator" class="creator sisi">
        <div class="judul" data-aos="fade-down">
          <h1>Creator</h1>
=======

    <section>
      <div id="creator" class="creator sisi">
        <div class="judul sisi">
          <h3>PEMBUAT</h3>
          <h1>Safsar-Tim</h1>
          <p>Kami memiliki anggota yang aktif, baik hati, dan juga pada ganteng, kami siap membantu anda jika memiliki masalah saat menggunakan website kami.</p>
>>>>>>> 68d6b83 (DONE)
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <!-- Slides for each creator -->
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">

=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
>>>>>>> 68d6b83 (DONE)
                <div class="creator-name">Wisnu</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Azmi</div>
=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
                <div class="creator-name">Yazdi</div>
>>>>>>> 68d6b83 (DONE)
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
>>>>>>> 68d6b83 (DONE)
                <div class="creator-name">Ikmal</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
                <div class="creator-name">Riswan</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
>>>>>>> 68d6b83 (DONE)
                <div class="creator-name">Vikri</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Vikri</div>
=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
                <div class="creator-name">Fahman</div>
>>>>>>> 68d6b83 (DONE)
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
<<<<<<< HEAD
                <img src="https://i.pinimg.com/736x/6c/7c/61/6c7c61d98431ac649262e1a4da240c57.jpg" alt="">
                <div class="creator-name">Vikri</div>
=======
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
                <div class="creator-name">Damar</div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="creator-slide">
                <img src="https://static9.depositphotos.com/1594920/1088/i/450/depositphotos_10880072-stock-photo-mixed-breed-monkey-between-chimpanzee.jpg" width="100%" alt="">
                <div class="creator-name">Alif</div>
>>>>>>> 68d6b83 (DONE)
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="contact-we sisi" id="contact">
        <div class="kotak-contak">
<<<<<<< HEAD
=======
          <i class='bx bxs-objects-vertical-bottom'></i>
          <h3>Tujuan</h3>
          <p>Website ini dibuat sebagai bagian dari tugas mata pelajaran Produk Kreatif dan Kewirausahaan (PKK), dengan tujuan mengembangkan produk berbasis teknologi yang kreatif, fungsional, dan relevan di era digital saat ini.</p>
          <!-- <button>Hubungi Kami</button> -->
        </div>
        <div class="kotak-contak">
>>>>>>> 68d6b83 (DONE)
          <i class="fas fa-phone"></i>
          <h3>Hubungi Kami</h3>
          <p>Kami memiliki anggota untuk membantu anda</p>
          <button>Hubungi Kami</button>
        </div>
        <div class="kotak-contak">
          <i class="fas fa-envelope"></i>
          <h3>Email Us</h3>
<<<<<<< HEAD
          <p>Cukup kirimkan email kepada kami di <b>safsar@gmail.com</b></p>
          <button>Kirim Email</button>
=======
          <p>Jika anda ingin menhubungi lewat email ,cukup klik email kami di bawah ini
            <a href="mailto:safsartim@gmail.com"><b>safsar@gmail.com</b></a>
          </p>
>>>>>>> 68d6b83 (DONE)
        </div>
      </div>
    </section>
    <footer>
      <h1>2023-<?php echo date("Y") ?> &copy; Safsar Tim</h1>
    </footer>
  </main>

<<<<<<< HEAD
=======

>>>>>>> 68d6b83 (DONE)
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
<<<<<<< HEAD
</body>

</html>
=======
  <script>
    function tampilkan_menu() {
      var menu = document.querySelector(".menu-nav");
      menu.classList.toggle("active");
    }


    AOS.init();

    // Sticky Navbar
    const navbar = document.querySelector('.nav');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Toggle Menu Function
    const burger = document.getElementById("burger");
    const menuNav = document.getElementById("menu-nav");
    const burgerIcon = document.querySelector(".burger svg");

    burger.addEventListener("click", () => {
      menuNav.classList.toggle("active");

      // Change burger icon dynamically
      if (menuNav.classList.contains("active")) {
        burgerIcon.classList.remove("bx-menu");
        burgerIcon.classList.add("bx-x");
      } else {
        burgerIcon.classList.remove("bx-x");
        burgerIcon.classList.add("bx-menu");
      }
    });
  </script>
</body>
>>>>>>> 68d6b83 (DONE)
