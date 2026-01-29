const menu1 = document.getElementById('menu1');
const menu2 = document.getElementById('menu2');
const menu3 = document.getElementById('menu3');
  function toggleNav() {
    
    document.getElementById('headID').classList.add("h");
    document.getElementById("cartDrawer").classList.add("h");
    document.body.classList.add("h");
    document.body.classList.add("nav");
    document.body.style.overflowY = "hidden";
    if(document.getElementById('cartDrawer').classList.contains('active')) document.getElementById('cartDrawer').classList.remove('active');
    const nav = document.getElementById('nav');
    nav.classList.add('show');
    document.getElementById('footer').style.display='none';
    document.getElementById('openID').style.display='none';
    document.getElementById('closeID').style.display='flex';
    setTimeout(() => {
      menu1.classList.remove('first-hidden');
      menu1.classList.add('first-active');
    }, 300);


}

function switchMode() {
document.body.classList.toggle("dark");
document.getElementById("cartIcon-id").classList.toggle("dark");
if(document.getElementById("cartIcon-id").classList.contains("dark")){
  document.getElementById("switchID").innerHTML="";
  document.getElementById("switchID").innerHTML="Light Mode";
}
else{
  document.getElementById("switchID").innerHTML="";
  document.getElementById("switchID").innerHTML="Dark Mode";
}
updateCartIcon();


  
}

function closeAll(){
    document.body.classList.remove("nav");
    document.getElementById('headID').classList.remove("h");
    document.getElementById("cartDrawer").classList.remove("h");
    document.body.classList.remove("h");
    const nav = document.getElementById('nav');
    document.getElementById('footer').style.display='flex';
    document.getElementById('openID').style.display='flex';
    document.getElementById('closeID').style.display='none';
    nav.classList.remove('show');
    if(menu2.classList.contains('second-active')){
      setTimeout(() => {
        menu2.classList.remove('second-active');
        menu2.classList.add('second-hidden');
      },300)
    }
    if(menu1.classList.contains('first-active')){
      setTimeout(() => {
      menu1.classList.remove('first-active');
      menu1.classList.add('first-hidden');
      },300)
    }
    if(menu3.classList.contains('third-active')){
      setTimeout(() => {
      menu3.classList.remove('third-active');
      menu3.classList.add('third-hidden');
      },300)
    }

  }


function showMenu2() {
  menu1.classList.remove('first-active');
  menu1.classList.add('first-hidden');
  setTimeout(() => {
    menu2.classList.remove('second-hidden');
    menu2.classList.add('second-active');
  }, 300);
    document.getElementById('turnBackID').style.display='flex';
    document.getElementById('closeID').style.display='none';
}

function turnBack(){
  if(menu2.classList.contains('second-active')){
    menu2.classList.remove('second-active');
    menu2.classList.add('second-hidden');
      setTimeout(() => {
    menu1.classList.remove('first-hidden');
    menu1.classList.add('first-active');
  }, 300);
    document.getElementById('turnBackID').style.display='none';
    document.getElementById('closeID').style.display='flex';
  }
  if(menu3.classList.contains('third-active')){
    
          menu3.classList.remove('third-active');
          menu3.classList.add('third-hidden');
          document.getElementById("moveID").classList.remove("visible");

      setTimeout(() => {
    menu2.classList.remove('second-hidden');
    menu2.classList.add('second-active');
  }, 300);

  }

}


function showMenu3(){
  menu2.classList.remove('second-active');
  menu2.classList.add('second-hidden');
  setTimeout(() => {
    menu3.classList.remove('third-hidden');
    menu3.classList.add('third-active');
  }, 300);
  document.getElementById("moveID").classList.add("visible");

}
function toggleModel() {
    document.getElementById('headID').classList.add("h");
    document.body.classList.add("h");
    document.body.classList.add("nav");
    document.body.style.overflowY = "hidden";
    const nav = document.getElementById('nav');
    nav.classList.add('show');
    document.getElementById('footer').style.display='none';
    document.getElementById('openID').style.display='none';
    document.getElementById('turnBackID').style.display='flex';
    menu1.style.visibility = "hidden";
          setTimeout(() => {
    menu1.classList.remove('first-active');
    menu1.classList.add('first-hidden');
  }, 300);
   menu1.style.visibility = "visible";
      setTimeout(() => {
    menu2.classList.remove('second-hidden');
    menu2.classList.add('second-active');
  }, 300);
}


function updateHeaderButtons() {
    const cartbtn = document.getElementById('cart-btn-id');
    const userimg = document.getElementById('usr-img-id');
    const loginbtn = document.getElementById('login-btn-head-id');
    const signupbtn = document.getElementById('signup-btn-head-id');

    const isMobile = window.innerWidth < 768;

    const isLoggedIn = !!localStorage.getItem('auth_token');

    if(cartbtn) cartbtn.style.display = isLoggedIn ? "flex" : "none";
    if(userimg) userimg.style.display = isLoggedIn ? "flex" : "none";
    if(loginbtn) loginbtn.style.display = !isLoggedIn  ? "block" : "none";
    if(signupbtn) signupbtn.style.display = !isLoggedIn && !isMobile ? "block" : "none";
}

document.addEventListener('DOMContentLoaded', updateHeaderButtons);

window.addEventListener('resize', updateHeaderButtons);



function updateCartIcon() {
  const cartImg = document.getElementById('cartIcon-id');
  const imgUrl = getComputedStyle(document.body).getPropertyValue('--cart-img').trim();
  cartImg.src = imgUrl.replace(/url\(["']?(.+?)["']?\)/, '$1'); 
}

updateCartIcon();