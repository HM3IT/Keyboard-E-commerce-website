const themeToggler = document.getElementsByClassName("theme-toggler")[0];

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    document.getElementById('light-mode-toggle').classList.toggle("active");
    document.getElementById('dark-mode-toggle').classList.toggle("active");
});
