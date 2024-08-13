window.onscroll = function() {
    const navbar = document.getElementById("navbar");
    if (window.pageYOffset > navbar.offsetTop) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
};