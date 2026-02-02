const currentTheme = localStorage.getItem("theme");
console.log(currentTheme);
const Modebtn = document.getElementById("switchIDV");
const ModeDiv = document.getElementById("ModeDiv");

document.addEventListener("DOMContentLoaded", () => {
    if (currentTheme === "dark") {
        Modebtn.innerHTML = "";
        Modebtn.textContent = "Light Mode";
    }
    if (currentTheme === "Light") {
        Modebtn.innerHTML = "";
        Modebtn.textContent = "Dark Mode";
    }
});
ModeDiv.addEventListener("click", () => {
    const mode = localStorage.getItem("theme");
    if (mode === "dark") {
        mode = "Light";
    }
    if (mode === "Light") {
        mode = "Dark";
    }
    if (currentTheme === "dark") {
        Modebtn.innerHTML = "";
        Modebtn.textContent = "Light Mode";
    }
    if (currentTheme === "Light") {
        Modebtn.innerHTML = "";
        Modebtn.textContent = "Dark Mode";
    }
    localStorage.setItem("theme", mode);
});
