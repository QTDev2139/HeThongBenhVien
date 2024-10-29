function toggleDropdown() {
    document.getElementById("dropdownMenu").classList.toggle("show");
}

// Đóng dropdown nếu người dùng nhấp ra ngoài
window.onclick = function(event) {
    if (!event.target.matches('.user-account *')) {
        var dropdowns = document.getElementsByClassName("dropdown");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
