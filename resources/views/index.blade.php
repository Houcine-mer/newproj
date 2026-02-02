<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AutoDZ</title>
    <link rel="icon" href="images/simple-car-silhouette-sticker-u33a0-x450 5.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/maindarkmode.css') }}" rel="stylesheet">
    <link href="{{ asset('css/maingrid.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
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
        <button class="rev-btn">
          <a href = "/reviews" >REVIEWS</a>
        </button>
        <button class="about-btn">
         <a href="/about">ABOUT</a>
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
        <div><a href="/cars">Cars List</a></div>
        <div><a href="/tour">Tour</a></div>
        <div><a href="/reviews">Reviews</a></div>
        <div><a href="/about">About</a></div>
        <div class="dark-modesec">
          <button class="darkmodebt" id="darkmodebtn"> 
            <span id="darkModeIcon">🌙</span>
          </button>
        </div>
      </div>
    </div>      
    <div class="image-container">  
      <img src="images/upcoming-trends-in-the-world-of-car-dealerships.jpeg" alt="AutoDz" class="object-cover h-100 w-full md:h-[40vh] lg:h-[60vh]  opacity=80">
      <div class="absolute text-white font-bold text-[2rem] sm:text-[2.5rem] lg:text-[3rem] font-['Poppins'] top-[12vh] left-[6vw]">
        Find your perfect car
      </div>
    </div> 
    <div class="flex justify-center sm:mt-[5vh] sm:mb-[5vh] md:mb-0 lg:mt-[9vh] lg:mb-[9vh]">
      <h1 class="mt-[4vh] mb-[3vh] sm:mb-[6vh] md:mb-0 lg:mb-[5vh] text-[2rem] sm:text-[3rem] lg:text-[3.25rem] text-center font-bold font-['Poppins'] text-3xl text-black opacity-80">Featured Cars
      <p class="text-black  mt-[2vh] ml-[4vw] mr-[4vw] text-[1.25rem] sm:text-[1.5rem] xl-text-[2rem] font-bold text-center font-['Roboto'] align-left">Discover Our handpicked selection of premium vehicles available for purshase or rental </p>
      </h1>
    </div>

    <div class="cars-grid">
      <div class="car-card">
        <img style="margin-top: 3vh; margin-bottom:1vh ;margin-left: 9px;border-radius:10%" src="/images/GlaSuv.jpg" alt="bmw x5" title="bmw x5" width="95%" height="40%">
        <h3 class="text-center text-xl sm:text-2xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">MERCEDES GLA SUV</h3>
        <h2 id="price1" class="text-2xl lg:text-lg" style="margin-top: 0;">$70000</h2>
        <p style="margin-top: 0;">or $89/day</p>
        <br />
        <div class="flex justify-center gap-[4vw] xl:gap-[4vw]">
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem]  font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
        </div>
      </div>
    
      <div class="car-card">
        <img class="mx-auto" style=" margin-top: 1vh; margin-bottom:1vh ;border-radius:10%" src="/images/rs6-pic.avif" alt="tesla" title="tesla" width="95%" height="40%">
        <h3 class="text-center text-xl sm:text-2xl lg:text-xl font-bold font-['Poppins']"  style="margin-top: 0;">AUDI RS6</h3>
        <h2 id="price2" class="text-2xl lg:text-lg" style="margin-top: 0;">$120000</h2>
        <p style="margin-top: 0;">or $89/day</p>
        <br />
        <div class="flex justify-center gap-[4vw] xl:gap-[4vw]">
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem]  font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
        </div>
      </div>
    
      <div class="car-card">
        <img style="margin-top: 1vh; margin-bottom:1vh ;margin-left: 9px;border-radius:10%" src="/images/G-Class.jpg" alt="bmw x5" title="bmw x5" width="95%" height="40%">
        <h3 class="text-center text-xl sm:text-2xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">MERCEDES G-CLASS</h3>
        <h2 id="price3" class="text-2xl lg:text-lg" style="margin-top: 0;">$150000</h2>
        <p style="margin-top: 0;">or $69/day</p>
        <br />
        <div class="flex justify-center gap-[4vw] xl:gap-[4vw]">
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem]  font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
        </div>
      </div>
    
      <div class="car-card">
        <img class="mx-auto" style="margin-top: 1vh; margin-bottom:1vh" src="/images/M3.webp" alt="mercedes" title="mercedes" width="95%" height="50%">
        <h3 class="text-center text-xl sm:text-2xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">BMW M3</h3>
        <h2 id="price4" class="text-2xl lg:text-lg" style="margin-top: 0;">$120000</h2>
        <p style="margin-top: 0;">or $79/day</p>
        <br />
        <div class="flex justify-center gap-[4vw] xl:gap-[4vw]">
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
          <a class="bg-gray-900 px-[8vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.25rem] lg:text-[1rem]  font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
        </div>
      </div>
    </div>
    <div class="flex justify-center">
      <a href="/cars" class="inline-flex mt-14 md:mt-30 justify-center items-center px-[8vw] lg:px-[6vw] py-2 md:py-4 lg:py-2 bg-gray-900 text-white text-[1rem] lg:text-[1.25rem] font-bold font-['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">
        View All Cars
      </a>
    </div>
    <br><br><br><br>
    <h1 class=" mb-[9vh] lg:mb-[14vh] text-[2.25rem] sm:text-[3rem] md:text-[3.25rem] lg:text-[3.25rem] text-center font-bold font-['Poppins'] text-black opacity-80 " >Our Services</h1>
    <div class="services-grid">
      <div class="service-item">
        <div>
          <h3 class=" mt-[1.7vh] mb-4 text-[1.75rem] sm:[3rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">Buy Cars</h3>
          <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left" >  
            Browse thousands of new and usedcars from certified dealers and private sellers. Get the best deals with our price comparison tools.
          </p>
        </div>
      </div>
    
      <div class="service-item">
        <div>
          <h3 class=" mb-4 text-[1.75rem] sm:[3rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">
            Rent Cars
          </h3>
          <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left">  
            Browse thousands of new and used
            Rent cars for any occasion from daily commutes to weekend getaways.
            We offer competitive rates and a seamless rental experience:
          </p>
        </div>
      </div>
    
      <div class="service-item">
        <div>
          <h3 class=" mb-4 text-[1.75rem] sm:[3rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">
            Test Drive 
          </h3>
          <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left">  
            Take any car for a few hours to experience its
            performance and comfort. Test drive multiple vehicles to make 
            an informed decision before buying:
          </p>
        </div>
      </div>
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
    <div class="dropdown" id="dropdownMenu">
      <button id="logoutBtn"class="dropdownbtn">Logout</button>
    </div>
    
    <script src="{{ asset('js/maindark.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <script src="{{ asset('js/headerScript.js') }}"></script>
    <script src="{{ asset('js/load-all.js') }}"></script>
    <script src="{{ asset('js/usrly.js') }}"></script>
  </body>
</html>
