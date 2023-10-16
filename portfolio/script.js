// Desplegable del menu
let menuIcon = document.querySelector("#menu-icon");
let navBar = document.querySelector(".navbar");

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navBar.classList.toggle('active');
}

// Cierre del desplegable
window.onscroll = () => {
    menuIcon.classList.remove('bx-x');
    navBar.classList.remove('active');
}