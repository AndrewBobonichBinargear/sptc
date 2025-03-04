document.addEventListener("DOMContentLoaded", function () {
    const header = document.getElementById("header_main");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            if (header.classList.contains("header_white")) {
                header.classList.add("header-fixed-white");
            } else {
                header.classList.add("header-fixed");
            }
        } else {
            header.classList.remove("header-fixed");
            header.classList.remove("header-fixed-white");
        }
    });
});
