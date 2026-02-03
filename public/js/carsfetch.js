let currentBrand = null;
let start = 0;

let currentCars =[];
let admin = false;

function isAdmin() {
  const user = localStorage.getItem('user_data');
  if (!user) return false;

  try {
    const parsed = JSON.parse(user);
    return parsed.is_admin === true || parsed.is_admin === 1 || parsed.is_admin === "1";
  } catch (e) {
    return false;
  }
}

document.addEventListener('DOMContentLoaded', () => {
    admin = isAdmin();
    console.log('Admin?', admin);

    if (admin) {
        const container = document.getElementById("gg");
        if (!container) return;
        const addCarBtn = document.createElement('button');
        addCarBtn.id = 'add--car-btn';
        addCarBtn.innerHTML = '<div>Add a Car</div>';
        const addbrandBtn = document.createElement('button');
        addbrandBtn.id = 'add--brand-btn';
        addbrandBtn.innerHTML = '<div>Add a Brand</div>';
        const deletebrandBtn = document.createElement('button');
        deletebrandBtn.id = 'delete--brand-btn';
        deletebrandBtn.innerHTML = '<div>Delete a Brand</div>';

        container.appendChild(addCarBtn);
        container.appendChild(addbrandBtn);
        container.appendChild(deletebrandBtn);

        addCarBtn.addEventListener('click', () => {
            const modal = document.getElementById("createCarModal");
            if (modal) {
                modal.classList.add('show');
            }
        });
        addbrandBtn.addEventListener('click', () => {
            const _modal = document.getElementById("createBrandModal");
            if (_modal) {
                _modal.classList.add('show');
            }
        });
        deletebrandBtn.addEventListener('click', () => {
            const __modal = document.getElementById("deleteBrandModal");
            if (__modal) {
                __modal.classList.add('show');
            }
        });
    }
});



const containers = document.querySelectorAll(".car-container");
const moveBar    = document.getElementById("moveID");
const prevBtn    = document.getElementById("previous");
const nextBtn    = document.getElementById("next");

function getMaxVisibleCount() {
  return Array.from(containers).filter(c => {
    const s = window.getComputedStyle(c);
    return s.display !== "none";  
  }).length;
}

function update() {
  start = 0;
  currentBrand = null;
  currentCars = [];
  moveBar.classList.remove("visible");

}

async function showCarList(brand){
    currentBrand = brand;
    start = 0;

    const models =await fetchcars(currentBrand);
    console.log(models);
    currentCars = models || [];
    renderPage();
}

async function fetchcars(brand) {
    try {
        const response = await fetch(`/api/cars/${encodeURIComponent(brand)}`);
        if(!response.ok) {
            throw new Error(`Request failed with status ${response.status}`);
        }

        let cars = await response.json(); 
        if (Array.isArray(cars) && Array.isArray(cars[0])) {
            cars = cars.flat(); 
        }
        return cars;
    } catch (error) {
        console.error('Error fetching cars:', error);
        return [];
    }
    
}
async function createCar(carData) {
  try {
    const response = await fetch('/api/cars', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: JSON.stringify(carData),   
    });

    if (!response.ok) {
      throw new Error(`Create failed with status ${response.status}`);
    }

    const createdCar = await response.json(); 
    alert(`Car : "${createdCar.name}" created successfully`);  
    return createdCar;
  } catch (error) {
    console.error('Error creating car:', error);
    throw error;
  }
}

async function deleteCar(carId) {
  try {
    const response = await fetch(`/api/cars/${carId}`, {
      method: "DELETE",
      headers: {
        "Accept": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`Delete failed with ${response.status}`);
    }

    console.log("Car deleted:", carId);
    return true;
  } catch (error) {
    console.error("Error deleting car:", error);
    return false;
  }
}

async function updateCar(carId, updatedData) {
  try {
    const response = await fetch(`/api/cars/${carId}`, {
      method: "PATCH", 
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      },
      body: JSON.stringify(updatedData),
    });

    if (!response.ok) {
      throw new Error(`Update failed with ${response.status}`);
    }

    return await response.json();
  } catch (error) {
    console.error("Error updating car:", error);
    return null;
  }
}

let updatingCarId = null; 

function openUpdateForm(car) {
  updatingCarId = car.id;

  document.getElementById("updateName").value      = car.name;
  document.getElementById("updateYear").value      = car.year || "";
  document.getElementById("updateImage").value     = car.img || "";
  document.getElementById("updateBuyPrice").value  = car.buyprice || "";
  document.getElementById("updateRentPrice").value = car.rentprice || "";
  document.getElementById("updateTourPrice").value = car.tourprice || "";
  document.getElementById("updateBuy").checked     = car.buy;
  document.getElementById("updateRent").checked    = car.rent;
  document.getElementById("updateTour").checked    = car.tour;
  document.getElementById("updateModal").classList.add('show');  
}


document.getElementById("cancelUpdate").addEventListener("click", () => {
  updatingCarId = null;
    document.getElementById("updateModal").classList.remove('show');
});

document.getElementById("updateForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const updatedData = {
    name: document.getElementById("updateName").value,
    year: parseInt(document.getElementById("updateYear").value),
    image_url: document.getElementById("updateImage").value,
    buyprice: parseFloat(document.getElementById("updateBuyPrice").value) || null,
    rentprice: parseFloat(document.getElementById("updateRentPrice").value) || null,
    tourprice: parseFloat(document.getElementById("updateTourPrice").value) || null,
    buy: document.getElementById("updateBuy").checked,
    rent: document.getElementById("updateRent").checked,
    tour: document.getElementById("updateTour").checked
  };

  console.log("Sending JSON to backend:", JSON.stringify(updatedData));

  const updatedCar = await updateCar(updatingCarId, updatedData);
  if (updatedCar){
    console.log(updatedCar);
    if (updatedCar && updatedCar.data) {
    const updated = updatedCar.data;
    const index = currentCars.findIndex(c => c.id === updated.id);
    if (index !== -1) {
        currentCars[index] = updated; 
    }
    renderPage();
}

  }

  updatingCarId = null;
    document.getElementById("updateModal").classList.remove('show');
});
 

document.getElementById("createCarForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const createdData = {
    brand_name : document.getElementById("brandName").value,
    name: document.getElementById("carName").value,
    year: parseInt(document.getElementById("carYear").value),
    image_url: document.getElementById("carImage").value,
    buyprice: parseFloat(document.getElementById("carBuyPrice").value) || null,
    rentprice: parseFloat(document.getElementById("carRentPrice").value) || null,
    tourprice: parseFloat(document.getElementById("carTourPrice").value) || null,
    buy: document.getElementById("checkBuy").checked,
    rent: document.getElementById("checkRent").checked,
    tour: document.getElementById("checkTour").checked
  };

  console.log("Sending JSON to backend:", JSON.stringify(createdData));

  const createdCar = await createCar(createdData);

    document.getElementById("createCarModal").classList.remove('show');
});


document.getElementById("cancelCreateCar").addEventListener("click", () => {
    document.getElementById("createCarModal").classList.remove('show');
});









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
    if (admin) {
      const updateBtn = document.createElement("button");
      updateBtn.className = "img-btn update-btn";
      updateBtn.innerHTML = `
    ✏️
    <span class="tooltip">Update</span>
  `;
      updateBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        openUpdateForm(car);
      });

      const deleteBtn = document.createElement("button");
      deleteBtn.className = "img-btn delete-btn";
      deleteBtn.innerHTML = `
    ✖
    <span class="tooltip">Delete</span>
  `;
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

      container.appendChild(updateBtn);
      container.appendChild(deleteBtn);
    }

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
    container.appendChild(nameEl);
    container.appendChild(img);
    container.appendChild(btnDiv);
  }
  const hasPrev = start > 0;
  const hasNext = start + visibleCount < totalCars;

  moveBar.classList.toggle("visible", hasPrev || hasNext);

  prevBtn.style.opacity = hasPrev ? "1" : "0";
  prevBtn.style.pointerEvents = hasPrev ? "auto" : "none";

  nextBtn.style.opacity = hasNext ? "1" : "0";
  nextBtn.style.pointerEvents = hasNext ? "auto" : "none";
}



nextBtn.onclick = () => {
  const visibleCount = getMaxVisibleCount();
  if (start + visibleCount < currentCars.length) {
    start += visibleCount;
    renderPage();
  }
};

prevBtn.onclick = () => {
  const visibleCount = getMaxVisibleCount();
  start = Math.max(0, start - visibleCount);
  renderPage();
};


window.addEventListener("resize", () => {
  if (currentBrand) {
    const visibleCount = getMaxVisibleCount();
    start = Math.floor(start / visibleCount) * visibleCount;
    renderPage();
  }
});
