function toggleDropDown() {
    var menu = document.getElementById("menu");
    var button = document.getElementById("menu-btn");

    if (button.classList.contains("open")) {
        menu.style.opacity = '0%';
        menu.style.visibility = "hidden";
    } else {
        menu.style.opacity = '100%';
        menu.style.visibility = "visible";
    }

    button.classList.toggle("open")
}
