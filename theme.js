// Theme Toggle
const themeToggle = document.getElementById("themeToggle");
const currentTheme = localStorage.getItem("theme") || "light";
document.body.className = currentTheme;
themeToggle.textContent = currentTheme === "light" ? "🌙" : "☀️";

themeToggle.addEventListener("click", () => {
    const newTheme = document.body.classList.contains("light") ? "dark" : "light";
    document.body.className = newTheme;
    localStorage.setItem("theme", newTheme);
    themeToggle.textContent = newTheme === "light" ? "🌙" : "☀️";
});
