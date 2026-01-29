function toggleNav() {
  document.getElementById('headID').classList.add("h");
  document.getElementById('openID').style.display='none';
  document.getElementById('closeID').style.display='flex';
  document.getElementById("cartDrawer").classList.add("h");
  if(document.getElementById('cartDrawer').classList.contains('active')) document.getElementById('cartDrawer').classList.remove('active');
  document.getElementById('links-drawer').classList.add('active');
}

function closeAll(){
  document.getElementById('headID').classList.remove("h");
  document.getElementById('openID').style.display='flex';
  document.getElementById('closeID').style.display='none';
  document.getElementById("cartDrawer").classList.remove("h");
  document.getElementById('links-drawer').classList.remove('active');
}

function switchMode() {
  document.body.classList.toggle("dark");
  
  const formContainer = document.querySelector('.form-container');
  const bottombar=document.querySelector('.bottombar');
  const copyright=document.querySelector('.copyright');
  const termsandprivacy=document.querySelector('.termsandprivacy');
  if (formContainer) {
    formContainer.classList.toggle("dark");
  }
  if (bottombar) {
    bottombar.classList.toggle("dark");
  }
  if (copyright) {
    copyright.classList.toggle("dark");
  }
  if (termsandprivacy) {
    termsandprivacy.classList.toggle("dark");
  }
  
}