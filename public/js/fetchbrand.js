document.getElementById("cancelCreateBrand").addEventListener("click", () => {
    document.getElementById("createBrandModal").classList.remove('show');
});

async function getBrands() {
    try {
        const res = await fetch('/api/brands');
        const data = await res.json();

        if (!res.ok) throw new Error(data.message || 'Failed to load brands');

        console.log('Brands:', data);
        return data;
    } catch (err) {
        console.error(err);
        alert(err.message);
    }
}





document.addEventListener("DOMContentLoaded", () => {
    const createBrandForm = document.getElementById("createBrandForm");

    if (!createBrandForm) return;

    createBrandForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const nameInput = document.getElementById("b-name");
        const name = nameInput.value.trim();
        if (!name) return;

        try {
            const res = await fetch("/api/brands", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ name }),
            });

            const data = await res.json();
            if (!res.ok) throw new Error(data.message || "Failed to create brand");

            createBrandForm.reset();

            console.log("Brand created:", data);
            alert(`Brand "${name}" created successfully`);
            document.getElementById("createBrandModal").classList.remove('show');


        } catch (err) {
            console.error(err);
            alert(err.message);
            document.getElementById("createBrandModal").classList.remove('show');
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const deleteBrandForm = document.getElementById("deleteBrandForm");
    const cancelBtn = document.getElementById("cancelDeleteBrand");
    const modal = document.getElementById("deleteBrandModal");

    if (!deleteBrandForm) return;

    cancelBtn.addEventListener("click", () => {
        modal.classList.remove("show");
        deleteBrandForm.reset();
    });

    deleteBrandForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        const nameInput = document.getElementById("br-name");
        const name = nameInput.value.trim();
        if (!name) return;

        if (!confirm(`Are you sure you want to delete "${name}"?`)) return;

        try {
            const res = await fetch(`/api/brands/${encodeURIComponent(name)}`, {
                method: "DELETE",
                headers: { "Accept": "application/json" },
            });

            const data = await res.json();

            if (!res.ok) throw new Error(data.message || "Failed to delete brand");

            deleteBrandForm.reset();
            alert(`Brand "${name}" deleted successfully`);
            modal.classList.remove("show");

        } catch (err) {
            console.error(err);
            alert(err.message);
            modal.classList.remove("show");
        }
    });
});


async function loadBrandsIntoSecondPhase() {
    const container = document.getElementById("brandloadphase");
    if (!container) return;

    container.innerHTML = "";

    const brands = await getBrands();
    if (!brands) return;

    brands.forEach(brand => {
        const brandbtn = document.createElement("button");
        brandbtn.onclick = () => {
            showMenu3();
            showCarList(brand.name);
        };
        const brandDiv = document.createElement("div");
        brandDiv.textContent = brand.name;
        const addition = document.createElement("p");
        addition.innerHTML = ">";
        brandbtn.appendChild(brandDiv);
        brandbtn.appendChild(addition);
        container.appendChild(brandbtn);
    });
}

