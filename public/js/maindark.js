const currentTheme = localStorage.getItem('theme');
const darkModeToggle = document.getElementById('darkmodebtn');
const darkModeIcon = document.getElementById('darkModeIcon');

if (currentTheme === 'dark') {
    document.body.classList.add('dark-mode');
    if (darkModeIcon) darkModeIcon.textContent = '☀️';
}

if (darkModeToggle) {
    darkModeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        
        const isDark = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        
        if (darkModeIcon) {
            darkModeIcon.textContent = isDark ? '☀️' : '🌙';
        }
    });
}