
    document.addEventListener('click', function(event) {
    var isClickInsideButton = document.getElementById('user-menu-button').contains(event.target);
    var isClickInsideDropdown = document.getElementById('user-dropdown').contains(event.target);
    var dropdown = document.getElementById('user-dropdown');
    var overlay = document.querySelector('.sidebar-overlay');
    if (!isClickInsideButton && !isClickInsideDropdown) {
    dropdown.classList.add('hidden');
    overlay.classList.add('hidden');
} else {
    dropdown.classList.toggle('hidden');
    overlay.classList.toggle('hidden');
}
});
