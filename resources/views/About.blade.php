<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" href="images/simple-car-silhouette-sticker-u33a0-x450 5.png">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/About.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutdark.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
  </head>

  <body>
    <br />
    <div class="header" style="font-family: roboto;" id="headID">
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
         <a href="/cars">CARS</a> 
        </button>
        <button class="about-btn">
          <a href="/tour">TOUR</a>
        </button>
        <button class="h-btn">
          <a href = "/" >HOME</a>
        </button>
      </div>

      <div class="right-side">
        <button class="login-btn" id="login-btn-head-id">
          <a href="/login">LOGIN</a>
        </button>
        <button id="signup-btn-head-id" class="sign-btn">
          <a href="/signup">SIGN UP</a>
        </button>
        <button class="cart-btn-kk" id= "cart-btn-id">
          <img id="cartIcon-id" alt="Profile" class="cart--pic-kk">
        </button>
      </div>
      <div class="user-info-kk" id="usr-img-id">
        <img src="{{ asset('/images/mercedes-black-raobpqc23szwxs7d.jpg') }}" alt="Profile" class="profile-pic-kk">
      </div>
    </div>
    <div id="cartDrawer">
      <div class="cart-header">
        <h3>Orders</h3>
      </div>
      <div class="cart-content" id="cart-content">
      </div>
    </div>
    <div id="links-drawer">
      <div class="cart-header">
        <h3>Sections</h3>
      </div>
      <div class="cart-content" style="display:flex;flex-direction:column;font-size:1.5rem; gap:20px;"id="cart-content">
        <div><a href="/">Home</a></div>
        <div><a href="/cars">Cars List</a></div>
        <div><a href="/tour">Tour</a></div>
        <div class="dark-modesec">
          <button class="darkmodebt" id="darkmodebtn"> 
            <span id="darkModeIcon">🌙</span>
          </button>
        </div>
      </div>
    </div>  

    <div class="mid" >
      <div class="image">
        <img src="images/image.png" alt="About us image" class="about-image">
        <div>
          <p class="About-text">About Our Store</p>
          <p id="line" class="Line">_____________</p>
        </div>
      </div>
        <div class="content">
          <img class="vintagecar" src="images/vintage1.jpg" alt="Vintage Car">
          <img class="only-desktop" src="images/vintage.jpg" >
          <h3 class="heading">High Quality</h3>
          <p class="para" >
            AutoDz based in Algeria , Offers a variety of great quality cars with resonable prices , corresponding to the needs of millions of Algerians all across the country ,  solving your transportation problems and making life easier for our client is our main priority . 
          </p>
          <img class="ourmissionimg" src="images/modern.jpg" alt="Our Mission Image">
          <img class="only-desktop1" src="images/testlamode.jpg" >
          <h3 class="heading2">Our Mission</h3>
          <p class="para2">
            At AutoDz, we are dedicated to providing affordable vehicles that perfectly align with your unique needs and lifestyle. We understand that choosing a car is about more than just transportation ,it's about security, comfort, advanced technology, and peace of mind. That's why every vehicle in our inventory is carefully selected to meet the highest standards of safety, reliability, and innovation.</p>
        </div>
      
        <div class="py-4 bg-gray-900 w-full">
          <div class="max-w-7xl mx-auto px-4">
            <p class="text-white font-bold text-center text-xl md:text-2xl font-['Poppins'] mb-4">
              Contact And Support
            </p>
            
            <div class="flex items-center justify-center gap-4 mb-4">
              <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img class="w-8 h-8 md:w-10 md:h-10" src="images/2023_Facebook_icon.svg.png" alt="Facebook Icon">
              </a>
              <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                <img class="w-8 h-8 md:w-11 md:h-11" src="images/vecteezy_instagram-logo-on-square-style-with-transparent-background_42127166.png" alt="Instagram Icon">
              </a>
              <a href="https://x.com" target="_blank" rel="noopener noreferrer">
                <img class="w-8 h-8 md:w-10 md:h-10" src="images/x.jpg" alt="Twitter Icon">
              </a>
            </div>
        
            <div class="text-center">
              <a href="" class="text-white text-sm md:text-base font-['Roboto'] hover:underline">
                Help Center
              </a>
            </div>
          </div>
        </div>

        <div class="flex flex-col md:flex-row justify-center md:justify-between items-center bg-[#181818] px-4 md:px-8 py-4 gap-2">
          <p class="text-xs text-white text-center md:text-left">© 2024 AutoDz. All rights reserved.</p>
          <p class="text-xs text-white text-center md:text-right">
            <a href="#" class="terms-link hover:underline">Terms of Service</a> | 
            <a href="#" class="privacy-link hover:underline">Privacy Policy</a>
          </p>
        </div>
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
        <div><a href="/reviews">Reviews</a></div>
      </div>
    </div>
    <script src="{{ asset('js/maindark.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <script src="{{ asset('js/headerScriptabout.js') }}"> </script>
    <script src="{{ asset('js/headerScript.js') }}"></script>
    <script src="{{ asset('js/load-all.js') }}"></script>
    <script src="{{ asset('js/usrly.js') }}"></script>
  </body>
</html>