// THIS FOR ALL OTHER PAGES EXCEPT /cars


async function loadRentOrders(userId) {
  try {
    const response = await fetch(`/api/checkout/rent/${userId}`);
    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const orders = await response.json();
    const container = document.getElementById("cart-content");
    container.innerHTML = ""; 

    orders.forEach(order => {
      const rentCard = document.createElement("div");
      rentCard.classList.add("rent-card");

      rentCard.innerHTML = `
        <img src="${order.image_url}" alt="${order.name}">

        <div class="rent-info">
          <div class="rent-top">
            <h4>${order.name}</h4>
            <span class="rent-status">RENT</span>
          </div>

          <p class="rent-dates">${formatDate(order.pivot.start_date)} – ${formatEndDate(order.pivot.start_date, order.pivot.number_of_days)}</p>
          
          <div class="rent-bottom">
          <span class="rent-price">total price: DZD${order.pivot.total_price}</span>
          
                <button class="remove-btn-kk" 
                    data-user-id="${userId}" 
                    data-car-id="${order.pivot.car_id}">✖</button>

          </div>
        </div>
      `;

      container.appendChild(rentCard);
    });

    document.querySelectorAll(".remove-btn-kk").forEach(btn => {
      btn.addEventListener("click", e => {
        const userId = e.target.dataset.userId;
        const carId = e.target.dataset.carId;
        removeRentOrder(userId, carId);
      });
    });

  } catch (error) {
    console.error("Error fetching rent orders:", error);
  }
}
function formatDate(dateStr) {
  const options = { day: "2-digit", month: "short" };
  return new Date(dateStr).toLocaleDateString("en-US", options);
}
function formatEndDate(startDateStr, days) {
  const date = new Date(startDateStr);
  date.setDate(date.getDate() + days );
  return formatDate(date.toISOString().split("T")[0]);
}


async function removeRentOrder(userId, carId) {
  try {
    const response = await fetch(`api/checkout/rent/${userId}/${carId}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    });

    const data = await response.json();

    if (response.ok) {
      console.log(data.message);
      const card = document.querySelector(`.remove-btn-kk[data-user-id='${userId}'][data-car-id='${carId}']`).closest('.rent-card');
      if (card) card.remove();
    } else {
      console.error("Error deleting order:", data.message);
    }
  } catch (error) {
    console.error("Error deleting order:", error);
  }
}
