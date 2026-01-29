
function renderPage() {
  if (!currentBrand || !currentCars) return;

  const models       = currentCars;
  const totalCars    = models.length;
  const visibleCount = getMaxVisibleCount();   


  containers.forEach(c => {
    c.innerHTML = "";
    c.style.visibility = "visible";   
  });


  if (start >= totalCars) {
    start = Math.max(0, totalCars - visibleCount);
  }
  if (start < 0) start = 0;

  
  for (let i = 0; i < visibleCount; i++) {
    const idx = start + i;
    const container = containers[i];

    if (idx >= totalCars) {
      container.style.visibility = "hidden";
      continue;
    }

    const car = models[idx];
    container.dataset.id = car.id;

    const nameEl = document.createElement("div");
nameEl.textContent = car.name; 
nameEl.classList.add("car-name");

const img = document.createElement("img");
img.src = car.image_url; 
img.alt = car.name;
img.classList.add("car-img");
img.loading = "lazy";


    const btnDiv = document.createElement("div");
    btnDiv.classList.add("car-buttons");

    if (car.buy) {
      const b = document.createElement("button");
      b.className = "buy-btn";
      b.innerHTML = "<div>Buy</div><div>></div>";
      b.dataset.id = car.id;
      btnDiv.appendChild(b);
    }
    if (car.rent) {
      const b = document.createElement("button");
      b.className = "rent-btn";
      b.innerHTML = "<div>Rent</div><div>></div>";
      b.dataset.id = car.id;
      b.dataset.rentPrice = car.rentprice;
      btnDiv.appendChild(b);
    }


  const updateDiv = document.createElement("div");
  updateDiv.classList.add("car-buttons");
  const updateBtn = document.createElement("button");
  updateBtn.textContent = "✏️";
  updateBtn.style=""
  updateBtn.addEventListener("click", () => openUpdateForm(car));
  updateDiv.appendChild(updateBtn);

  const deleteBtn = document.createElement("button");
  deleteBtn.textContent = "✖";
  deleteBtn.addEventListener("click", async (e) => {
  e.stopPropagation(); 

  if (confirm(`Are you sure you want to delete ${car.name}?`)) {
      const success = await deleteCar(car.id); 
      if (success) {
        
          currentCars = currentCars.filter(c => c.id !== car.id);

          
          renderPage();
      } else {
          alert("Failed to delete the car.");
      }
  }
});
  updateDiv.appendChild(deleteBtn)

    container.appendChild(nameEl);
    container.appendChild(img);
    container.appendChild(btnDiv);
    if(admin) container.appendChild(updateDiv);
  }


  const hasPrev = start > 0;
  const hasNext = start + visibleCount < totalCars;

  moveBar.classList.toggle("visible", hasPrev || hasNext);
  prevBtn.style.opacity = hasPrev ? "1" : "0";
  prevBtn.style.pointerEvents = hasPrev ? "auto" : "none";
  nextBtn.style.opacity = hasNext ? "1" : "0";
  nextBtn.style.pointerEvents = hasNext ? "auto" : "none";
}