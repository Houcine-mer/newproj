<!DOCTYPE html>
<html id="htmlID">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/allStyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/carsForms.css') }}">
    <link rel="preload" as="image" href="/images/mercedes-black-raobpqc23szwxs7d.jpg">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="header" id="headID">

      <div class="left-side">
        <button class="show-btn" onclick="toggleNav()" id="openID">
          <p>&#8801;</p>
        </button>
        <button class="close-btn" onclick="closeAll()" id="closeID">
          <p>X</p>
        </button>
        <button class="turn-back-btn" onclick="turnBack(); update()" id="turnBackID">
          <p>&#x2190;</p>
        </button>  
      </div>

      <div class="middle-side">
        <button class="home-btn">
         <a href="/">HOME</a> 
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

    <main>
      <div class="fixed-nav">
        <div class="nav-bar" id="nav">

          <ul class="first-" id="menu1">
            <div class="first-phase" id="gg">
              <button onclick="showMenu2() ,loadBrandsIntoSecondPhase()">
                <div>Models</div>
                <p>></p>
              </button>
              <button onclick="switchMode()" id="switchID">Dark Mode</button>
            </div>
          </ul>

          <ul class="second-hidden" id="menu2">
            <div class="second-phase" id="brandloadphase">
              <button onclick="showCarList('Mercedes-benz'); showMenu3()">
                <div>Mercedes-Benz</div>
                <p>></p>
              </button>
              <button onclick="showCarList('Audi'); showMenu3()">
                <div> audi </div>
                <p >></p>
              </button>
              <button onclick="showCarList('Toyota'); showMenu3()">
                <div >Toyota</div>
                <p >></p>
              </button>
              <button onclick="showCarList('BMW'); showMenu3()">
                <div>BMW</div>
                <p>></p>
              </button>
              <button onclick="showCarList('Volkswagen'); showMenu3()">
                <div>Volkswagen</div>
                <p>></p>
              </button>
            </div>
          </ul >

          <ul class="third-hidden" id="menu3">
            <div class="third-phase" id="thID">
              <div class="car-container">   
              </div>
              <div class="car-container">                  
              </div>
              <div class="car-container">                  
              </div>
              <div class="car-container">            
              </div>
              <div class="car-container">                  
              </div>
              <div class="car-container">                  
              </div>
              <div class="car-container">                  
              </div>
              <div class="car-container">       
              </div>
            </div>
          </ul>

        </div>
      </div>

      <div class="move-btn" id="moveID">
        <button id="previous" >Previous</button>
        <button id="next" >Next</button>
      </div>

      <div class="main-buttons-container" id="footer" >

        <div class="main-buttons-content">
          <div class="main-buttons-logo">AutoDZ</div>
          <div class="main-buttons-title">NEW EXPRIENCE</div>
        </div>

        <div class="main-buttons">
          <button class="ALL-MODELS" id="AllModelsID" onclick="toggleModel()">
            All Models
          </button>
        <button class="EXPLORE" onclick="toggleNav()">
            Explore
        </button>
        </div>

      </div>
    </main>


<div id="rent-modal">
  <div>
    <h2>Rent a Car</h2>
    <form id="rent-form">
      <label>Start Date: <input type="date" id="rent-start-date" required></label>
      <label>Number of Days: <input type="number" id="rent-days" min="1" required></label>
      <label>Total Price: <input type="text" id="rent-total-price" readonly value="$0"></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="close-rent-modal">Cancel</button>
      </div>
    </form>
  </div>
</div>


<div id="update-rent-order-modal">
  <div>
    <h2>Update Rent Order</h2>
    <form id="update-rent-order-form">
      <label>Start Date: <input type="date" id="update-rent-order-start-date" required></label>
      <label>Number of Days: <input type="number" id="update-rent-order-days" min="1" required></label>
      <label>Total Price: <input type="text" id="update-rent-order-total" readonly value="$0"></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="close-update-rent-order-modal" onclick="closeUpdateRentOrderModal()">Cancel</button>
      </div>
    </form>
  </div>
</div>




<div class="dropdown" id="dropdownMenu">
  <button id="logoutBtn"class="dropdownbtn">Logout</button>
</div>


    
<div id="updateModal">
  <div>
    <h2>Update a Car</h2>
    <form id="updateForm">
      <label>Name: <input type="text" id="updateName" required></label>
      <label>Year: <input type="number" id="updateYear"></label>
      <label>Image URL: <input type="text" id="updateImage"></label>
      <label>Buy Price: <input type="number" id="updateBuyPrice" step="0.01"></label>
      <label>Rent Price: <input type="number" id="updateRentPrice" step="0.01"></label>
      <label>Tour Price: <input type="number" id="updateTourPrice" step="0.01"></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Buy</span><input type="checkbox" id="updateBuy" ></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Rent</span><input type="checkbox" id="updateRent"></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Tour</span><input type="checkbox" id="updateTour"></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelUpdate">Cancel</button>
      </div>
    </form>
  </div>
</div>

<div id="createCarModal">
  <div>
    <h2>Add a Car</h2>
    <form id="createCarForm">
      <label>Brand Name: <input type="text" name="brand_name" id="brandName" required></label>
      <label>Car Name: <input type="text" name="name" id="carName" required></label>
      <label>Year: <input type="number" name="year" id="carYear"></label>
      <label>Image URL: <input type="text" name="image_url" id ="carImage" required></label>
      <label>Buy Price: <input type="number" step="0.01" name="buyprice" id="carBuyPrice"></label>
      <label>Rent Price: <input type="number" step="0.01" name="rentprice" id ="carRentPrice"></label>
      <label>Tour Price: <input type="number" step="0.01" name="tourprice" id ="carTourPrice"></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Buy</span><input type="checkbox" name="buy" id ="checkBuy" ></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Rent</span><input type="checkbox" name="rent" id ="checkRent"></label>
      <label class="check--upd"><span style="display:flex; justify-content: center; align-items: center;">Tour</span><input type="checkbox" name="tour" id ="checkTour"></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelCreateCar">Cancel</button>
      </div>
    </form>
  </div>
</div>

<div id="createBrandModal">
  <div>
    <h2>Add a Brand</h2>
    <form id="createBrandForm">
      <label>Brand Name: <input type="text" name="name" id="b-name" required></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelCreateBrand">Cancel</button>
      </div>
    </form>
  </div>
</div>

<div id="deleteBrandModal">
  <div>
    <h2>delete a Brand</h2>
    <form id="deleteBrandForm">
      <label>Brand Name: <input type="text" name="name" id="br-name" required></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelDeleteBrand">Cancel</button>
      </div>
    </form>
  </div>
</div>

<script src="{{ asset('js/globalTour.js') }}"></script>
<script src="{{ asset('js/CarsList.js') }}"></script>
<script src="{{ asset('js/carsfetch.js') }}"></script>
<script src="{{ asset('js/rent.js') }}"></script>
<script src="{{ asset('js/auth.js') }}"></script>
<script src="{{ asset('js/fetchbrand.js') }}"></script>
  </body>

  

</html>

