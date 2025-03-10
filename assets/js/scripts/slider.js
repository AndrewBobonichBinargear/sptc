var swiper = new Swiper(".swiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  grabCursor: false,
  initialSlide: 0,
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: 10,
  speed: 2000,
  mousewheel: false,
  allowTouchMove: false,
  on: {
    click(event) {
      swiper.slideTo(this.clickedIndex);
    },
  },
});

function initSwipers() {
    document.querySelectorAll('.swiper-container').forEach((container, index) => {
        const swiper = new Swiper(container, {
            loop: true,
            pagination: {
                el: container.querySelector('.swiper-pagination'),
                clickable: true,
            },
            allowTouchMove: false,
        });
    });
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".fleet-gallery, .fleet-gallery-showcase").forEach((slider) => {
        let paginationEl = slider.querySelector(".swiper-pagination");

        let swiperInstance = new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: paginationEl,
                clickable: true,
            },
            autoplay: false,
            speed: 200,
            mousewheel: false,
            allowTouchMove: false,
        });
    });

    let outerSlider = new Swiper(".outer-slider", {
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 50,
        loop: false,
        mousewheel: false,
        simulateTouch: false,
        allowTouchMove: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".outer-next",
            prevEl: ".outer-prev",
        },
        speed: 2000,
    });

    document.querySelectorAll(".category-button").forEach((button) => {
        button.addEventListener("click", function () {
            let slideIndex = parseInt(this.getAttribute("data-slide"));
            outerSlider.slideToLoop(slideIndex);

            document.querySelectorAll(".category-button").forEach((btn) => {
                btn.classList.remove("active");
            });

            this.classList.add("active");
        });
    });
});
