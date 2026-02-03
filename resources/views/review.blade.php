<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AutoDz — Car Reviews</title>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('css/review.css') }}" rel="stylesheet"  >
  <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
  <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body >

  <div class="header" id="headID">


    <div class="left-side">
      <button class="show-btn" onclick="toggleNav()" id="openID">
        <p>&#8801;</p>
      </button>
      <button class="close-btn" onclick="closeAll()" id="closeID">
        <p>X</p>
      </button>
    </div>


    <div class="middle-side">
      <button class="home-btn">
        <a href="/">HOME</a> 
      </button>
        
      <button class="about-btn">
        <a href="/cars">CARS</a>
      </button>
      <button class="rev-btn">
        <a href = "/tour" >TOUR</a>
      </button>
      <button class="about-btn">
        <a href="/about">ABOUT</a>
      </button>
    </div>



    <div class="right-side">
      <button class="login-btn" id="login-btn-head-id">
        <a href="/login">LOGIN</a>
      </button>
      <button class="sign-btn" id="signup-btn-head-id">
        <a href="/signup"> SIGN UP</a>
      </button>
        <button class="cart-btn-kk" id= "cart-btn-id">
          <img id="cartIcon-id" alt="Profile" class="cart--pic-kk">
        </button>
      </div>
        <div class="user-info-kk" id="usr-img-id">
            <img src="{{ asset('/images/mercedes-black-raobpqc23szwxs7d.jpg') }}" alt="Profile" class="profile-pic-kk">
        </div>
    </div>
  </div>

  <header class="hero">
    <h1>Car Reviews</h1>
    <p>Honest and clear reviews about the most popular cars in Algeria.</p>
  </header>

  <!-- ===== REVIEWS SECTION ===== -->
  <section class="reviews">
    <h2>Top Rated Cars</h2>
    <div class="car-grid">

      <div class="car-card">
        <img src="images/renault clio.avif" alt="Renault Clio">
        <h3>Renault Clio 5</h3>
        <p class="rating">⭐ 4.6 / 5</p>
        <p class="price">2,400,000 DZD</p>
        <button class="btn">View Details</button>
      </div>

      <div class="car-card">
        <img src="images/peugeot 208.jpeg" alt="Peugeot 208">
        <h3>Peugeot 208</h3>
        <p class="rating">⭐ 4.4 / 5</p>
        <p class="price">2,600,000 DZD</p>
        <button class="btn">View Details</button>
      </div>

      <div class="car-card">
        <img src="images/Hyundai-i10.jpg" alt="Hyundai i10">
        <h3>Hyundai i10</h3>
        <p class="rating">⭐ 4.2 / 5</p>
        <p class="price">2,100,000 DZD</p>
        <button class="btn">View Details</button>
      </div>

      <div class="car-card">
        <img src="images/seat ibiza.jpeg" alt="Seat Ibiza">
        <h3>Seat Ibiza</h3>
        <p class="rating">⭐ 4.3 / 5</p>
        <p class="price">2,350,000 DZD</p>
        <button class="btn">View Details</button>
      </div>

      <div class="car-card">
        <img src="images/dacia logan.jpeg" alt="Dacia Logan">
        <h3>Dacia Logan</h3>
        <p class="rating">⭐ 3.9 / 5</p>
        <p class="price">1,950,000 DZD</p>
        <button class="btn">View Details</button>
      </div>

    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    © 2025 AutoDz — All rights reserved.
  </footer>


  <div id="cartDrawer">
  <div class="cart-header">
    <h3>Orders</h3>
  </div>

  <div class="cart-content" id="cart-content">
  </div>
</div>

      <div class="dropdown" id="dropdownMenu">
        <button id="logoutBtn"class="dropdownbtn">Logout</button>
    </div>
    <div id="links-drawer">
  <div class="cart-header">
    <h3>Sections</h3>
  </div>

  <div class="cart-content" style="display:flex;flex-direction:column;font-size:1.5rem; gap:20px;"id="cart-content">
    <div><a href="/">Home</a></div>
    <div><a href="/cars">Cars List</a></div>
    <div><a href="/tour">Tour</a></div>
    <div><a href="/about">About</a></div>
    <div onclick="switchMode()" id="switchID">Dark Mode</div>
  </div>
</div>
<script src="{{ asset('js/auth.js') }}"></script>
  <script src="{{ asset('js/review.js') }}"></script>
  <script src="{{ asset('js/headerScript.js') }}"></script>
        <script src="{{ asset('js/load-all.js') }}"></script>
        <script src="{{ asset('js/usrly.js') }}"></script>
</body>
</html>
