document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.querySelector('.menu-toggle');
    var menu = document.querySelector('.main-navigation');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('toggled');
    });
});
