document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burger-menu");
  const nav = document.querySelector(".main-navigation");
  const body = document.body;

  burger.addEventListener("click", function () {
    nav.classList.toggle("active");
    burger.classList.toggle("active");
    body.classList.toggle("no-scroll");
  });
});
