const button = document.getElementById("button");

function toggleDropDown() {
    var menu = document.getElementById("menu");
    var button = document.getElementById("menu__button")
    if (button.classList.contains("open")) {
        menu.style.opacity = '0%';
    } else {
        menu.style.opacity = '100%';
    }

    button.classList.toggle("open")
}
