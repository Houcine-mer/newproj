
async function loadTourCars() {
  try {
    const response = await fetch('/api/tour-cars');
    const cars = await response.json();

    const select = document.getElementById('carNameT');
    select.innerHTML = '<option value="">Select a car</option>';

    cars.forEach(car => {
      const option = document.createElement('option');
      option.value = car.id;       // stored
      option.textContent = car.name; // shown
      select.appendChild(option);
    });
  } catch (error) {
    console.error('Failed to load tour cars:', error);
  }
}

loadTourCars();

/* =========================
   OPEN / CLOSE MODAL
========================= */
document.getElementById("book-tour-btn").addEventListener("click", () => {
  document.getElementById("createTourModal").classList.add("show");
});

document.getElementById("cancelCreateTour").addEventListener("click", () => {
  document.getElementById("createTourModal").classList.remove("show");
});

/* =========================
   SUBMIT TOUR ORDER
   ROUTE: /checkout/tour/{id}/{carID}
========================= */
document.getElementById("createTourForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const user = JSON.parse(localStorage.getItem("user_data"));
  if (!user) {
    alert("Please login first");
    return;
  }

  const user_id = user.id;
  const car_id = document.getElementById("carNameT").value;

  const data = {
    start_date: document.getElementById("DateT").value,
    number_of_hours: document.getElementById("DurationT").value
  };

  try {
    const res = await fetch(`/api/checkout/tour/${user_id}/${car_id}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: JSON.stringify(data)
    });

    const result = await res.json();

    if (!res.ok) {
      throw new Error(result.message || "Failed to book tour");
    }

    alert("Tour booked successfully ✅");
    document.getElementById("createTourForm").reset();
    document.getElementById("createTourModal").classList.remove("show");

  } catch (error) {
    console.error(error);
    alert(error.message);
  }
});


async function removeTourOrder(userId, carId) {
  try {
    const response = await fetch(`api/checkout/tour/${userId}/${carId}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    });

    const data = await response.json();

    if (response.ok) {
      console.log(data.message);
      const card = document.querySelector(`.remove-btn-kk-t[data-user-id='${userId}'][data-car-id='${carId}']`).closest('.rent-card');
      if (card) card.remove();
    } else {
      console.error("Error deleting order:", data.message);
    }
  } catch (error) {
    console.error("Error deleting order:", error);
  }
}




