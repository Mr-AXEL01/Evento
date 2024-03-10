
    document.addEventListener('click', function(event) {
    var isClickInside = document.getElementById('user-menu-button').contains(event.target);
    var dropdown = document.getElementById('user-dropdown');
    if (!isClickInside) {
    dropdown.classList.add('hidden');
} else {
    dropdown.classList.toggle('hidden');
}
});
