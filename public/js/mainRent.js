let selectedCarId = null;
let selectedRentPrice = 0;
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".main-rent-btn");
  if (!btn) return;

  e.preventDefault();

  selectedCarId = btn.dataset.id;
  selectedRentPrice = parseFloat(btn.dataset.rentPrice);

  document.getElementById("rent-modal").classList.add("show");
  const daysInput = document.getElementById("rent-days");
  daysInput.value = 1;
  document.getElementById("rent-total-price").value = `DZD${selectedRentPrice.toFixed(2)}`;
});
document.getElementById("close-rent-modal").addEventListener("click", () => {
  document.getElementById("rent-modal").classList.remove("show");
});

document.getElementById("rent-days").addEventListener("input", (e) => {
  let days = parseInt(e.target.value) || 1;
  let total = selectedRentPrice * days;
  document.getElementById("rent-total-price").value = `DZD${total.toFixed(2)}`;
});



document.getElementById("rent-form").addEventListener("submit", async (e) => {
  e.preventDefault();
  const startDate = document.getElementById("rent-start-date").value;
  const numberOfDays = document.getElementById("rent-days").value;

  if (!userId) {
    alert("login required");
    window.location.href = '/login';
    return;
  }

  const totalPrice = selectedRentPrice * numberOfDays;

  try {
    const response = await fetch(`api/checkout/rent/${userId}/${selectedCarId}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        start_date: startDate,
        number_of_days: numberOfDays,
      })
    });

    const data = await response.json();

    if (response.ok) {
      alert(data.message || "Rent order created!");
      document.getElementById("rent-modal").classList.remove("show");
      loadRentOrders(userId);
    } else {
      alert(data.message || "Error creating rent order");
      document.getElementById("rent-modal").classList.remove("show");
    }

  } catch (error) {
    console.error("Error creating rent order:", error);
    alert("Error creating rent order");
  }
});
