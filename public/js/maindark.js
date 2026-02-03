const Modebtn = document.getElementById("switchIDV");

function applyTheme(theme) {
    if (theme === "dark") {
        document.body.classList.add("dark");
        document.getElementById("cartIcon-id")?.classList.add("dark");
        Modebtn.textContent = "Light Mode";
        updateCartIcon();
    } else {
        document.body.classList.remove("dark");
        document.getElementById("cartIcon-id")?.classList.remove("dark");
        Modebtn.textContent = "Dark Mode";
    }
}

// Load theme on page load
document.addEventListener("DOMContentLoaded", () => {
    const theme = localStorage.getItem("theme") || "light";
    applyTheme(theme);
});

// Toggle on click
Modebtn.addEventListener("click", () => {
    const currentTheme = localStorage.getItem("theme") || "light";
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    localStorage.setItem("theme", newTheme);
    applyTheme(newTheme);
    updateCartIcon();
});
